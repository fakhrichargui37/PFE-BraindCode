<script setup>
import { ref, computed, onMounted, watch } from 'vue';
import { usePage } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link, router } from '@inertiajs/vue3';
import axios from "axios";

// Advanced Sidebar Toggle
const isSidebarOpen = ref(true);
const isSidebarCollapsing = ref(false);

const toggleSidebar = () => {
  if (isSidebarOpen.value) {
    // Start closing animation
    isSidebarCollapsing.value = true;
    setTimeout(() => {
      isSidebarOpen.value = false;
      isSidebarCollapsing.value = false;
    }, 300);
  } else {
    // Open sidebar
    isSidebarOpen.value = true;
  }
};

// Existing component logic remains the same as previous implementation
const filterFormations = async () => {
  if (selectedCategory.value !== "") {
    await router.get("/formationscat", {
      category: selectedCategory.value,
    }, { preserveState: true });
  }
};

const props = defineProps({
  formations: {
    type: Array,
    default: () => [],
  },
  categories: {
    type: Array,
    default: () => [],
  }
});

const searchQuery = ref("");
const formations = ref(props.formations); 

watch(
  () => props.formations,
  (newFormations) => {
    formations.value = newFormations || [];
  }
);

const searchFormations = async () => {
  await router.get("/formations", {
    search: searchQuery.value,
  }, { preserveState: true });
};

const categories = ref([]);
const selectedCategory = ref("");
const selectedCategoryName = ref("");

onMounted(async () => {
  try {
    const response = await axios.get("/categories");
    categories.value = response.data;
  } catch (error) {
    console.error("Erreur lors du chargement des catégories", error);
  }
});

const page = usePage();
const user = computed(() => page.props.auth.user); 

const role = computed(() => user.value?.role || 'user'); 

const showingNavigationDropdown = ref(false);

const toggleNavigationDropdown = () => {
  showingNavigationDropdown.value = !showingNavigationDropdown.value;
};

const navigateToRoute = (routeName) => {
  router.visit(route(routeName));
};

const logout = async () => {
  await router.post(route('logout'));
};
</script>

<template>
<<<<<<< HEAD
  <div class="flex relative">
    <!-- Sidebar Toggle Button -->
    <button 
      @click="toggleSidebar" 
      class="sidebar-toggle-button z-[1100]"
    >
      <svg 
        xmlns="http://www.w3.org/2000/svg" 
        class="h-6 w-6 transition-transform duration-300"
        :class="isSidebarOpen ? 'rotate-180' : ''"
        fill="none" 
        viewBox="0 0 24 24" 
        stroke="currentColor"
      >
        <path 
          stroke-linecap="round" 
          stroke-linejoin="round" 
          stroke-width="2" 
          d="M11 19l-7-7 7-7m8 14l-7-7 7-7" 
        />
      </svg>
    </button>

    <!-- Floating Sidebar -->
    <div 
      class="sidebar fixed top-0 left-0 h-full transition-all duration-300 ease-in-out overflow-hidden"
      :class="{
        'w-0 opacity-0': !isSidebarOpen,
        'w-72 opacity-100': isSidebarOpen,
        'shadow-lg': isSidebarCollapsing
      }"
    >
      <div class="relative h-full w-72 bg-[#1e2433] text-white p-6 overflow-y-auto">
        <div class="flex items-center mb-6">
          <Link :href="route('dashboard')" class="text-xl font-bold">
            <ApplicationLogo class="block h-9 w-auto fill-current text-gray-200" />
          </Link>
=======
    <div>
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <nav
                class="border-b border-gray-100 bg-white dark:border-gray-700 dark:bg-gray-800"
            >
                <!-- Primary Navigation Menu -->
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 justify-between">
                        <div class="flex">
                      

                              <!-- Navigation Links -->
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
  <!-- Si Formateur -->
  <template v-if="role === 'formateur'">
    <NavLink :href="route('DashboardFormateur')" :active="route().current('DashboardFormateur')">
      Dashboard Formateur
    </NavLink>
    <NavLink :href="route('upload.videos')" :active="route().current('upload.videos')">
      Upload Vidéos
    </NavLink>
    <NavLink :href="route('afficher.videos')" :active="route().current('afficher.videos')">
      Voir Vidéos
    </NavLink>
    <NavLink 
      :href="route('formations.index')" 
      :active="route().current('formations.index')"
    >
      Formations
    </NavLink>
  </template>

  <!-- Si Admin -->
  <template v-else-if="role === 'admin'">
    <NavLink :href="route('DashboardAdmin')" :active="route().current('DashboardAdmin')">
      Dashboard Administrateur
    </NavLink>
    <NavLink :href="route('formateur.en.attente')" :active="route().current('formateur.en.attente')">
      Formateurs en attente
    </NavLink>
    <NavLink :href="route('formateur.list')" :active="route().current('formateur.list')">
      Formateurs
    </NavLink>
    <NavLink 
      :href="route('formations.index')" 
      :active="route().current('formations.index')"
    >
      Formations
    </NavLink>
  </template>

  <!-- Pour les autres utilisateurs (inclut le rôle 'user') -->
  <template v-else>
    <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
      Dashboard
    </NavLink>
    <NavLink 
      :href="route('formations.index')" 
      :active="route().current('formations.index')"
    >
      Formations
    </NavLink>
  </template>
</div>

                        </div>

                        <div class="hidden sm:ms-6 sm:flex sm:items-center">
                            <!-- Settings Dropdown -->
                            <div class="relative ms-3">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300"
                                            >
                                                {{ $page.props.auth.user.name }}

                                                <svg
                                                    class="-me-0.5 ms-2 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink
                                            :href="route('profile.edit')"
                                        >
                                            Profile
                                        </DropdownLink>
                                        <DropdownLink
                                            :href="route('logout')"
                                            method="post"
                                            as="button"
                                        >
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button
                                @click="
                                    showingNavigationDropdown =
                                        !showingNavigationDropdown
                                "
                                class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none dark:text-gray-500 dark:hover:bg-gray-900 dark:hover:text-gray-400 dark:focus:bg-gray-900 dark:focus:text-gray-400"
                            >
                                <svg
                                    class="h-6 w-6"
                                    stroke="currentColor"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex':
                                                !showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex':
                                                showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div
                    :class="{
                        block: showingNavigationDropdown,
                        hidden: !showingNavigationDropdown,
                    }"
                    class="sm:hidden"
                >
                    <div class="space-y-1 pb-3 pt-2">
                        <ResponsiveNavLink
                            :href="route('dashboard')"
                            :active="route().current('dashboard')"
                        >
                            Dashboard
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div
                        class="border-t border-gray-200 pb-1 pt-4 dark:border-gray-600"
                    >
                        <div class="px-4">
                            <div
                                class="text-base font-medium text-gray-800 dark:text-gray-200"
                            >
                                {{ $page.props.auth.user.name }}
                            </div>
                            <div class="text-sm font-medium text-gray-500">
                                {{ $page.props.auth.user.email }}
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.edit')">
                                Profile
                            </ResponsiveNavLink>
                            <ResponsiveNavLink
                                :href="route('logout')"
                                method="post"
                                as="button"
                            >
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header
                class="bg-white shadow dark:bg-gray-800"
                v-if="$slots.header"
            >
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
>>>>>>> a81829e (nfadelkouch ya fakhrouch)
        </div>

        <!-- Search Bar -->
        <div class="mb-4">
          <input 
            v-model="searchQuery"
            type="text"
            placeholder="Search Formations"
            class="w-full px-4 py-2 bg-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            @input="searchFormations"
          />
        </div>

        <!-- Categories Dropdown -->
        <div class="relative mb-4">
          <Dropdown align="right" width="48">
            <template #trigger>
              <span class="inline-flex rounded-md w-full">
                <button
                  type="button"
                  class="inline-flex items-center w-full rounded-md border border-transparent bg-gray-700 px-3 py-2 text-sm font-medium leading-4 text-white transition duration-150 ease-in-out hover:bg-gray-600 focus:outline-none"
                >
                  {{ selectedCategoryName || "Select Category" }}
                  <svg
                    class="-me-0.5 ms-2 h-4 w-4"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </button>
              </span>
            </template>
            
            <template #content>
              <DropdownLink
                v-for="category in categories"
                :key="category.id"
                @click="() => {
                  selectedCategory = category.id;
                  selectedCategoryName = category.name;
                  filterFormations();
                }"
              >
                {{ category.name }}
              </DropdownLink>
            </template>
          </Dropdown>
        </div>

        <!-- Sidebar Navigation Links -->
        <div class="space-y-2">
          <template v-if="role === 'formateur'">
            <NavLink 
              v-for="link in [
                { route: 'DashboardFormateur', label: 'Dashboard Formateur' },
                { route: 'upload.videos', label: 'Upload Vidéos' },
                { route: 'afficher.videos', label: 'Voir Vidéos' },
                { route: 'formations.index', label: 'Formations' }
              ]"
              :key="link.route"
              :href="route(link.route)"
              :active="route().current(link.route)"
              class="block px-4 py-2 hover:bg-gray-700 rounded-lg transition-colors"
            >
              {{ link.label }}
            </NavLink>
          </template>
          
          <template v-else-if="role === 'admin'">
            <NavLink 
              v-for="link in [
                { route: 'DashboardAdmin', label: 'Dashboard Administrateur' },
                { route: 'formateur.en.attente', label: 'Formateurs en attente' },
                { route: 'formateurs.index', label: 'Formateurs' }
              ]"
              :key="link.route"
              :href="route(link.route)"
              :active="route().current(link.route)"
              class="block px-4 py-2 hover:bg-gray-700 rounded-lg transition-colors"
            >
              {{ link.label }}
            </NavLink>

            <div class="relative">
              <Dropdown align="right" width="48">
                <template #trigger>
                  <button class="w-full text-left px-4 py-2 hover:bg-gray-700 rounded-lg">
                    Sélectionner une page
                  </button>
                </template>
                <template #content>
                  <DropdownLink @click="navigateToRoute('categories.index')">
                    Catégories
                  </DropdownLink>
                  <DropdownLink @click="navigateToRoute('formations.index')">
                    Formations
                  </DropdownLink>
                </template>
              </Dropdown>
            </div>
          </template>
        </div>

        <!-- User Profile and Logout -->
        <div class="absolute bottom-0 left-0 right-0 p-6 border-t border-gray-700">
          <div class="flex justify-between items-center">
            <Link 
              :href="route('profile.edit')" 
              class="text-sm hover:text-blue-400 transition-colors"
            >
              Profile
            </Link>
            <button 
              @click="logout" 
              class="text-sm hover:text-red-400 transition-colors"
            >
              Déconnecter
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Content -->
    <div 
      class="main-content transition-all duration-300 ease-in-out"
      :class="{
        'ml-72': isSidebarOpen,
        'ml-0': !isSidebarOpen
      }"
    >
      <header 
        class="sticky top-0 z-50 transition-all duration-300"
        :class="{
          'pl-72': isSidebarOpen,
          'pl-0': !isSidebarOpen
        }"
      >
        <slot name="header" />
      </header>

      <main class="p-6">
        <slot />
      </main>
    </div>
  </div>
</template>

<style scoped>
/* Additional custom styles can be added here if needed */
.sidebar-toggle-button {
  position: fixed;
  top: 1rem;
  left: 1rem;
  z-index: 1100;
  background-color: rgba(74, 144, 226, 0.1);
  color: #4a90e2;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
}

.sidebar-toggle-button:hover {
  background-color: rgba(74, 144, 226, 0.2);
}
</style>