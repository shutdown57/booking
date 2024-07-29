<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    canLogin: {
        type: Boolean,
    },
});
</script>

<template>
    <header class="flex items-center px-4 w-full h-20 md:px-6 shrink-0 shadow">
        <a class="hidden mr-6 lg:flex" href="#">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="w-6 h-6"
            >
                <path d="m8 3 4 8 5-5 5 15H2L8 3z"></path>
            </svg>
            <span class="sr-only">Acme Inc</span>
        </a>
        <nav
            aria-label="Main"
            data-orientation="horizontal"
            dir="ltr"
            class="hidden relative z-10 flex-1 justify-center items-center max-w-max lg:flex"
        >
            <div style="position: relative">
                <ul
                    data-orientation="horizontal"
                    class="flex flex-1 justify-center items-center space-x-1 list-none group"
                    dir="ltr"
                >
                    <a
                        class="group inline-flex h-9 w-max items-center justify-center rounded-md bg-background px-4 py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground focus:outline-none disabled:pointer-events-none disabled:opacity-50 data-[active]:bg-accent/50 data-[state=open]:bg-accent/50"
                        data-radix-collection-item=""
                        href="#"
                    >
                        Home
                    </a>
                    <li>
                        <button
                            id="radix-:r6:-trigger-radix-:r7:"
                            data-state="closed"
                            aria-expanded="false"
                            aria-controls="radix-:r6:-content-radix-:r7:"
                            class="group inline-flex h-9 w-max items-center justify-center rounded-md bg-background px-4 py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground focus:outline-none disabled:pointer-events-none disabled:opacity-50 data-[active]:bg-accent/50 data-[state=open]:bg-accent/50 group"
                            data-radix-collection-item=""
                        >
                            Features
                            <svg
                                width="15"
                                height="15"
                                viewBox="0 0 15 15"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                                class="relative top-[1px] ml-1 h-3 w-3 transition duration-300 group-data-[state=open]:rotate-180"
                            >
                                <path
                                    d="M3.13523 6.15803C3.3241 5.95657 3.64052 5.94637 3.84197 6.13523L7.5 9.56464L11.158 6.13523C11.3595 5.94637 11.6759 5.95657 11.8648 6.15803C12.0536 6.35949 12.0434 6.67591 11.842 6.86477L7.84197 10.6148C7.64964 10.7951 7.35036 10.7951 7.15803 10.6148L3.15803 6.86477C2.95657 6.67591 2.94637 6.35949 3.13523 6.15803Z"
                                    fill="currentColor"
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        </button>
                    </li>
                    <a
                        class="group inline-flex h-9 w-max items-center justify-center rounded-md bg-background px-4 py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground focus:outline-none disabled:pointer-events-none disabled:opacity-50 data-[active]:bg-accent/50 data-[state=open]:bg-accent/50"
                        data-radix-collection-item=""
                        href="#"
                    >
                        Pricing
                    </a>
                    <a
                        class="group inline-flex h-9 w-max items-center justify-center rounded-md bg-background px-4 py-2 text-sm font-medium transition-colors hover:bg-accent hover:text-accent-foreground focus:bg-accent focus:text-accent-foreground focus:outline-none disabled:pointer-events-none disabled:opacity-50 data-[active]:bg-accent/50 data-[state=open]:bg-accent/50"
                        data-radix-collection-item=""
                        href="#"
                    >
                        Contact
                    </a>
                </ul>
            </div>
            <div class="flex absolute left-0 top-full justify-center"></div>
        </nav>
        <button
            class="inline-flex justify-center items-center w-10 h-10 text-sm font-medium whitespace-nowrap rounded-md border transition-colors lg:hidden focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:outline-none disabled:opacity-50 disabled:pointer-events-none ring-offset-background border-input bg-background hover:bg-accent hover:text-accent-foreground focus-visible:ring-ring"
            type="button"
            aria-haspopup="dialog"
            aria-expanded="false"
            aria-controls="radix-:r8:"
            data-state="closed"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="w-6 h-6"
            >
                <line x1="4" x2="20" y1="12" y2="12"></line>
                <line x1="4" x2="20" y1="6" y2="6"></line>
                <line x1="4" x2="20" y1="18" y2="18"></line>
            </svg>
            <span class="sr-only">Toggle navigation menu</span>
        </button>
        <div v-if="canLogin" class="ml-auto">
            <Link
                class="inline-flex justify-center items-center py-2 px-4 h-10 text-sm font-medium whitespace-nowrap rounded-md transition-colors focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:outline-none disabled:opacity-50 disabled:pointer-events-none ring-offset-background bg-primary text-primary-foreground hover:bg-primary/90 focus-visible:ring-ring"
                :href="route('dashboard')"
            >
                Login
            </Link>
        </div>
    </header>
</template>
