<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $settings->site_name }} - Transaction Pending</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        @media print {
            body {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            .no-print {
                display: none !important;
            }
            .print-container {
                max-width: 100% !important;
                box-shadow: none !important;
                border: none !important;
            }
        }

        /* Animated pulsing icon */
        @keyframes pulseSlow {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.08); opacity: 0.85; }
            100% { transform: scale(1); opacity: 1; }
        }

        .pulse-animate {
            animation: pulseSlow 2s ease-in-out infinite;
        }

        /* Circular loader ring */
        .loader-ring {
            width: 55px;
            height: 55px;
            border: 4px solid rgba(217, 119, 6, 0.25);
            border-top-color: #d97706;
            border-radius: 50%;
            animation: spin 1.2s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="min-h-screen py-8 px-4 sm:px-6 lg:px-8">

        <div class="max-w-3xl mx-auto print-container">

            <!-- Buttons -->
            <div class="flex justify-end mb-4 gap-3 no-print">
                <button onclick="window.print()" 
                    class="inline-flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition-colors">
                    <i data-lucide="printer" class="w-4 h-4 mr-2"></i>
                    Print
                </button>

                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                    <i data-lucide="home" class="w-4 h-4 mr-2"></i>
                    Dashboard
                </a>
            </div>

            <!-- Receipt Card -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">

                <!-- HEADER -->
                <div class="relative bg-amber-600 px-6 py-8 text-white">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <img class="h-12 w-auto" src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="{{ $settings->site_name }}">
                            <div class="ml-4">
                                <h1 class="text-xl font-bold">{{ $settings->site_name }}</h1>
                                <p class="text-sm text-white/90">Transaction Status</p>
                            </div>
                        </div>

                        <div class="flex flex-col items-end">
                            <div class="inline-flex items-center px-3 py-1 rounded-full bg-amber-500 text-white shadow pulse-animate">
                                <i data-lucide="loader" class="h-4 w-4 mr-1 animate-spin"></i>
                                <span class="text-sm font-medium">Pending</span>
                            </div>
                            <p class="text-sm mt-1 text-white/90">Ref: {{ $dp->txn_id }}</p>
                        </div>
                    </div>
                </div>

                <!-- BODY -->
                <div class="p-8">

                    <!-- Animated loader and message -->
                    <div class="text-center mb-8">
                        <div class="mx-auto loader-ring mb-6"></div>
                        <h2 class="text-2xl font-extrabold text-amber-700">Transaction Pending</h2>
                        <p class="text-md text-amber-700 mt-3 leading-relaxed max-w-xl mx-auto">
                            Your transaction is currently being reviewed.  
                            Please wait while we process your request.
                        </p>
                    </div>

                    <!-- PROFESSIONAL ACTION REQUIRED MESSAGE -->
                    <div class="bg-amber-50 border-l-4 border-amber-600 p-6 rounded-lg">
                        <div class="flex items-start">
                            <i data-lucide="alert-triangle" class="h-7 w-7 text-amber-600 mr-4 pulse-animate"></i>
                            <div>
                                <h3 class="text-lg font-bold text-amber-700">
                                    Action Required: Bank Details Not Linked
                                </h3>
                                <p class="text-md text-amber-700 mt-2 leading-relaxed">
                                    Your transaction is pending because your bank information is not connected to the server.
                                    <br><br>
                                    Please contact support to link your details and complete the transaction.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- FOOTER -->
                    <div class="mt-12 text-center border-t border-gray-100 pt-6">
                        <i data-lucide="shield-check" class="h-5 w-5 text-gray-400 mx-auto mb-2"></i>
                        <p class="text-xs text-gray-500">This page provides the current status of your transaction.</p>
                        <p class="text-xs text-gray-400 mt-1">© {{ date('Y') }} {{ $settings->site_name }}. All rights reserved.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
        });
    </script>
</body>

</html>
