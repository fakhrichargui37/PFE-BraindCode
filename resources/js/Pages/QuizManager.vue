<template>
  <div class="container">
    <h2>Créer un Quiz</h2>
    <form @submit.prevent="createCompleteQuiz">
      <input v-model="quiz.titre" placeholder="Titre du quiz" required />
      <input v-model.number="quiz.noteFinale" type="number" placeholder="Note Finale" required />
      <input v-model.number="quiz.dureeMaximale" type="number" placeholder="Durée Maximale (minutes)" required />
      
      <h3>Question</h3>
      <input v-model="question.contenu" placeholder="Texte de la question" required />
      
      <h3>Réponses</h3>
      <div v-for="(reponse, index) in reponses" :key="index">
        <input v-model="reponse.contenu" placeholder="Réponse" required />
        <label>
          <input type="checkbox" v-model="reponse.est_correcte" /> Correcte
        </label>
      </div>
      
      <button @click.prevent="addReponseField">Ajouter une Réponse</button>
      <button type="submit">Créer un Quiz Complet</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      quiz: {
        titre: '',
        noteFinale: null,
        dureeMaximale: null,
      },
      question: {
        contenu: '',
      },
      reponses: [{ contenu: '', est_correcte: false }],
    };
  },
  methods: {
    addReponseField() {
      this.reponses.push({ contenu: '', est_correcte: false });
    },
    async createCompleteQuiz() {
      try {
        // Créer le quiz
        const quizResponse = await axios.post('/quizzes/store', this.quiz);
        const quizId = quizResponse.data.quiz.id;
        
        // Ajouter la question
        const questionResponse = await axios.post('/questions', {
          quiz_id: quizId,
          contenu: this.question.contenu,
        });
        const questionId = questionResponse.data.question.id;
        
        // Ajouter les réponses
        await axios.post('/reponses', {
          question_id: questionId,
          reponses: this.reponses,
        });
        
        alert('Quiz complet créé avec succès !');
      } catch (error) {
        console.error(error);
        alert("Erreur lors de la création du quiz complet");
      }
    }
  }
};
</script>

<style scoped>
.container {
  max-width: 600px;
  margin: auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}
input {
  display: block;
  width: 100%;
  margin: 10px 0;
  padding: 8px;
}
button {
  margin-top: 10px;
  padding: 10px;
  background: #007bff;
  color: white;
  border: none;
  cursor: pointer;
}
button:hover {
  background: #0056b3;
}
</style>
