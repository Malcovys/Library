<template>
  <section class="gradient-form h-full p-10 shadow-[rgba(0,_0,_0,_0.4)_0px_30px_90px]">
    <div class="container h-full p-2">
      <div class="g-6 flex h-full flex-wrap items-center justify-center text-neutral-800 dark:text-neutral-200">
        <div class="w-full">
          <div class="block rounded-lg bg-white shadow-lg dark:bg-neutral-800">
            <div class="g-0 lg:flex lg:flex-wrap">
              <!-- Left column container-->
              <div class="px-4 md:px-0 lg:w-6/12">
                <div class="md:mx-6 md:p-12">
                  <!-- Logo -->
                  <div class="text-center">
                    <img
                      class="mx-auto w-48"
                      src="../assets/images/livreTest2.jpeg"
                      alt="logo"
                    />
                    <h4 class="mb-12 mt-1 pb-1 text-xl font-semibold">
                      <span class="text-green-400">We are</span>
                      <span class="text-teal-500"> book </span>
                      <span class="text-sky-400">lover</span>
                    </h4>
                  </div>

                  <div v-if="user">{{ user }}</div>

                  <form
                    class="mt-6 p-10 rounded-lg shadow-[0_35px_60px_-15px_rgba(0,0,0,0.3)]"
                    v-else
                    @submit.prevent="handleSubmit"
                  >
                    <p class="mb-4">Please login to your account</p>
                    <!-- Email input -->
                    <div class="mt-8">
                      <label for="email" class="block text-sm text-gray-950"
                        >Email</label
                      >
                      <input
                        type="email"
                        id="email"
                        name="email"
                        class="block w-full px-4 py-2 text-gray-950 bg-gray-100 rounded-md focus:border-pink-600 focus:ring-gray-100 focus:outline-none focus:ring focus:ring-opacity-40"
                        required
                        v-model="email"
                      />
                    </div>
                    <div class="mt-8">
                      <label for="password" class="block text-sm text-gray-950"
                        >Your Password</label
                      >
                      <div class="relative">
                        <input
                          id="password"
                          name="password"
                          class="block w-full px-4 py-2 text-gray-950 bg-gray-100 rounded-md focus:outline-none"
                          :type="showPassword ? 'text' : 'password'"
                          placeholder="Password"
                          v-model="password"
                        />
                        <button
                          type="button"
                          class="absolute top-2 right-2 text-gray-950"
                          @click="showPassword = !showPassword"
                        >
                          <svg
                            class="w-5 h-5"
                            :class="{
                              'text-green-500': showPassword,
                              'text-gray-400': !showPassword
                            }"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                          >
                            <path
                              d="M12 22s8-4 10-10-8-10-10-10-10 4-10 10 8 10 10 10z"
                            ></path>
                            <path d="M12 16l4-4-4-4m0 8"></path>
                          </svg>
                        </button>
                      </div>
                    </div>

                    <!-- Submit button -->
                    <div class="mb-12 pb-1 pt-1 text-center">
                      <button
                        class="mb-3 inline-block w-full rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)]"
                        type="submit"
                        data-te-ripple-init
                        data-te-ripple-color="light"
                        style="
                          background: linear-gradient(
                            to right,
                            #06f853,
                            #09dcab,
                            #3692dd,
                            #1905cb
                          );
                        "
                      >
                        Log in
                      </button>

                      <!-- Forgot password link -->
                      <a href="#!">Forgot password?</a>
                    </div>

                    <!-- Register button -->
                    <div class="flex items-center justify-between pb-6">
                      <p class="mb-0 mr-2">Don't have an account?</p>
                      <button
                        type="button"
                        class="inline-block rounded border-2 border-danger px-6 pb-[6px] pt-2 text-xs font-medium uppercase leading-normal text-danger transition duration-150 ease-in-out hover:border-danger-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-danger-600 focus:border-danger-600 focus:text-danger-600 focus:outline-none focus:ring-0 active:border-danger-700 active:text-danger-700 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                        data-te-ripple-init
                        data-te-ripple-color="light"
                      >
                        Register
                      </button>
                    </div>
                  </form>
                </div>
              </div>

              <!-- Right column container with background and description -->
              <div
                class="flex rounded-b-lg lg:w-6/12 lg:rounded-r-lg lg:rounded-bl-none"
              >
                <div class="md:mx-1 md:p-1">
                  <img
                    src="../assets/images/logo.jpg"
                    class="rounded-b-lg lg:w-full h-full lg:rounded-r-lg lg:rounded-bl-none"
                    alt=""
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
  import { API_URL } from '../config';

  export default {
    data() {
      return {
        email: '',
        password: '',
        showPassword: false,
        user: null,
      };
    },
    methods: {
      async fetchUserData() {
        const data = { email: this.email, password: this.password };

        try {
          const response = await fetch(API_URL + 'auth', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
          });

          if (response.ok) {
            this.user = await response.json();
          } else {
            console.error('Login failed');
          }
        } catch (error) {
          console.error('Error:', error);
        }
      },

      handleSubmit() {
        this.fetchUserData();
      },
    },
  };
</script>
