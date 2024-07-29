<script setup>
import Header from "@/Shared/Header.vue";
</script>

<template>
    <div class="flex min-h-screen flex-col bg-background">
        <Header />

        <main class="flex-1 px-4 py-6 sm:px-6 md:py-8">
            <div class="mx-auto grid max-w-6xl gap-8">
                <div
                    class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3"
                >
                    <div
                        class="rounded-lg border bg-card text-card-foreground shadow-sm"
                        data-v0-t="card"
                    >
                        <div class="flex flex-col space-y-1.5 p-6">
                            <h3
                                class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight"
                            >
                                Manage Courts
                            </h3>
                            <p class="text-sm text-muted-foreground">
                                View and update court availability and bookings.
                            </p>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-between">
                                <div class="text-4xl font-bold">12</div>
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
                                    class="h-10 w-10 text-primary"
                                >
                                    <path
                                        d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"
                                    ></path>
                                    <path
                                        d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"
                                    ></path>
                                    <path d="M4 22h16"></path>
                                    <path
                                        d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"
                                    ></path>
                                    <path
                                        d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"
                                    ></path>
                                    <path
                                        d="M18 2H6v7a6 6 0 0 0 12 0V2Z"
                                    ></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex items-center p-6">
                            <a
                                class="font-medium text-primary"
                                href="#"
                                rel="ugc"
                            >
                                Manage Courts
                            </a>
                        </div>
                    </div>
                    <div
                        class="rounded-lg border bg-card text-card-foreground shadow-sm"
                        data-v0-t="card"
                    >
                        <div class="flex flex-col space-y-1.5 p-6">
                            <h3
                                class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight"
                            >
                                Manage Tables
                            </h3>
                            <p class="text-sm text-muted-foreground">
                                View and update snooker table availability and
                                bookings.
                            </p>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-between">
                                <div class="text-4xl font-bold">8</div>
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
                                    class="h-10 w-10 text-primary"
                                >
                                    <path d="M12 3v18"></path>
                                    <rect
                                        width="18"
                                        height="18"
                                        x="3"
                                        y="3"
                                        rx="2"
                                    ></rect>
                                    <path d="M3 9h18"></path>
                                    <path d="M3 15h18"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex items-center p-6">
                            <a
                                class="font-medium text-primary"
                                href="#"
                                rel="ugc"
                            >
                                Manage Tables
                            </a>
                        </div>
                    </div>
                    <div
                        class="rounded-lg border bg-card text-card-foreground shadow-sm"
                        data-v0-t="card"
                    >
                        <div class="flex flex-col space-y-1.5 p-6">
                            <h3
                                class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight"
                            >
                                Manage Users
                            </h3>
                            <p class="text-sm text-muted-foreground">
                                View and update user accounts and memberships.
                            </p>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-between">
                                <div class="text-4xl font-bold">245</div>
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
                                    class="h-10 w-10 text-primary"
                                >
                                    <path
                                        d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"
                                    ></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex items-center p-6">
                            <a
                                class="font-medium text-primary"
                                href="#"
                                rel="ugc"
                            >
                                Manage Users
                            </a>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                    <div
                        class="rounded-lg border bg-card text-card-foreground shadow-sm"
                        data-v0-t="card"
                    >
                        <div class="flex flex-col space-y-1.5 p-6">
                            <h3
                                class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight"
                            >
                                Upcoming Bookings
                            </h3>
                            <p class="text-sm text-muted-foreground">
                                View and manage upcoming court and table
                                bookings.
                            </p>
                        </div>
                        <div class="p-6">
                            <div class="grid gap-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="font-medium">Court 3</div>
                                        <div
                                            class="text-sm text-muted-foreground"
                                        >
                                            10:00 AM - 11:00 AM
                                        </div>
                                    </div>
                                    <div>
                                        <div
                                            class="inline-flex w-fit items-center whitespace-nowrap rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80"
                                            data-v0-t="badge"
                                        >
                                            Pending
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="font-medium">
                                            Snooker Table 2
                                        </div>
                                        <div
                                            class="text-sm text-muted-foreground"
                                        >
                                            2:00 PM - 4:00 PM
                                        </div>
                                    </div>
                                    <div>
                                        <div
                                            class="inline-flex w-fit items-center whitespace-nowrap rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80"
                                            data-v0-t="badge"
                                        >
                                            Pending
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <div class="font-medium">Court 1</div>
                                        <div
                                            class="text-sm text-muted-foreground"
                                        >
                                            6:00 PM - 7:00 PM
                                        </div>
                                    </div>
                                    <div>
                                        <div
                                            class="inline-flex w-fit items-center whitespace-nowrap rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80"
                                            data-v0-t="badge"
                                        >
                                            Pending
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center p-6">
                            <a
                                class="font-medium text-primary"
                                href="#"
                                rel="ugc"
                            >
                                View All Bookings
                            </a>
                        </div>
                    </div>
                    <div
                        class="rounded-lg border bg-card text-card-foreground shadow-sm"
                        data-v0-t="card"
                    >
                        <div class="flex flex-col space-y-1.5 p-6">
                            <h3
                                class="whitespace-nowrap text-2xl font-semibold leading-none tracking-tight"
                            >
                                Calendar
                            </h3>
                            <p class="text-sm text-muted-foreground">
                                View and manage court and table availability.
                            </p>
                        </div>
                        <div class="p-6">
                            <div
                                class="rdp p-0 [&amp;_td]:w-10 [&amp;_td]:h-10 [&amp;_th]:w-10 [&amp;_[name=day]]:w-10 [&amp;_[name=day]]:h-10 [&amp;>div]:space-x-0 [&amp;>div]:gap-6"
                            >
                                <div
                                    class="flex flex-col sm:flex-row space-y-4 sm:space-x-4 sm:space-y-0"
                                >
                                    <div
                                        class="space-y-4 rdp-caption_start rdp-caption_end"
                                    >
                                        <div
                                            class="flex justify-center pt-1 relative items-center"
                                        >
                                            <div
                                                class="text-sm font-medium"
                                                aria-live="polite"
                                                role="presentation"
                                                id="react-day-picker-4"
                                            >
                                                July 2024
                                            </div>
                                            <div
                                                class="space-x-1 flex items-center"
                                            >
                                                <button
                                                    name="previous-month"
                                                    aria-label="Go to previous month"
                                                    class="rdp-button_reset rdp-button inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input hover:bg-accent hover:text-accent-foreground h-7 w-7 bg-transparent p-0 opacity-50 hover:opacity-100 absolute left-1"
                                                    type="button"
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
                                                        class="lucide lucide-chevron-left h-4 w-4"
                                                    >
                                                        <path
                                                            d="m15 18-6-6 6-6"
                                                        ></path>
                                                    </svg>
                                                </button>
                                                <button
                                                    name="next-month"
                                                    aria-label="Go to next month"
                                                    class="rdp-button_reset rdp-button inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input hover:bg-accent hover:text-accent-foreground h-7 w-7 bg-transparent p-0 opacity-50 hover:opacity-100 absolute right-1"
                                                    type="button"
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
                                                        class="lucide lucide-chevron-right h-4 w-4"
                                                    >
                                                        <path
                                                            d="m9 18 6-6-6-6"
                                                        ></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <table
                                            class="w-full border-collapse space-y-1"
                                            role="grid"
                                            aria-labelledby="react-day-picker-4"
                                        >
                                            <thead class="rdp-head">
                                                <tr class="flex">
                                                    <th
                                                        scope="col"
                                                        class="text-muted-foreground rounded-md w-9 font-normal text-[0.8rem]"
                                                        aria-label="Sunday"
                                                    >
                                                        Su
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="text-muted-foreground rounded-md w-9 font-normal text-[0.8rem]"
                                                        aria-label="Monday"
                                                    >
                                                        Mo
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="text-muted-foreground rounded-md w-9 font-normal text-[0.8rem]"
                                                        aria-label="Tuesday"
                                                    >
                                                        Tu
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="text-muted-foreground rounded-md w-9 font-normal text-[0.8rem]"
                                                        aria-label="Wednesday"
                                                    >
                                                        We
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="text-muted-foreground rounded-md w-9 font-normal text-[0.8rem]"
                                                        aria-label="Thursday"
                                                    >
                                                        Th
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="text-muted-foreground rounded-md w-9 font-normal text-[0.8rem]"
                                                        aria-label="Friday"
                                                    >
                                                        Fr
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="text-muted-foreground rounded-md w-9 font-normal text-[0.8rem]"
                                                        aria-label="Saturday"
                                                    >
                                                        Sa
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="rdp-tbody">
                                                <tr class="flex w-full mt-2">
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100 text-muted-foreground opacity-50"
                                                            role="gridcell"
                                                        >
                                                            30
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            1
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            2
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            3
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            4
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            5
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            6
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="flex w-full mt-2">
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            7
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            8
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            9
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            10
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            11
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            12
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            13
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="flex w-full mt-2">
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            14
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            15
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            16
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            17
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            18
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            19
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            20
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="flex w-full mt-2">
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            21
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            22
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            23
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            24
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            25
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            26
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            27
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="flex w-full mt-2">
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100 bg-accent text-accent-foreground"
                                                            role="gridcell"
                                                        >
                                                            28
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            29
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            30
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100"
                                                            role="gridcell"
                                                        >
                                                            31
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100 text-muted-foreground opacity-50"
                                                            role="gridcell"
                                                        >
                                                            1
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100 text-muted-foreground opacity-50"
                                                            role="gridcell"
                                                        >
                                                            2
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-center text-sm p-0 relative [&amp;:has([aria-selected])]:bg-accent first:[&amp;:has([aria-selected])]:rounded-l-md last:[&amp;:has([aria-selected])]:rounded-r-md focus-within:relative focus-within:z-20"
                                                        role="presentation"
                                                    >
                                                        <div
                                                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 p-0 font-normal aria-selected:opacity-100 text-muted-foreground opacity-50"
                                                            role="gridcell"
                                                        >
                                                            3
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center p-6">
                            <a
                                class="font-medium text-primary"
                                href="#"
                                rel="ugc"
                            >
                                View Calendar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>
