<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تأكيد الرحلة</title>
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
    <style>
        @page {
            margin: 0;
            size: letter;
        }
    </style>


</head>

<body id="contentToPrint" dir="rtl" class="w-full bg-pr">
    {{-- Header --}}
    <div class="bg-pr w-full h-32 p-4 flex justify-between items-center ">
        <img src="../assets/graphics/logos/logo_dark.png" alt="logo" class="size-24  ">
        <p class="font-pr text-center text-5xl">وصل تأكيد الرحلة </p>
        <img src="../assets/graphics/logos/qr_code.png" alt="qr code" class="size-24  ">
    </div>
    <div class="bg-white">
        {{-- driver & University --}}
        <div class="pt-8 px-4 flex gap-3 justify-between">
            <div class="bg-gray-100 w-1/2 rounded-xl border-2 border-pr p-4 flex  justify-start items-center gap-8">

                <img src="{{ '../storage/' . $trip->driver->user->image }}" alt="driver image"
                    class="size-24 rounded-full">
                <div class=" font-sec  ">
                    <p class="font-semibold text-3xl mb-3">{{ $trip->driver->user->name }}</p>
                    <p class="font-medium text-xl ">{{ $trip->driver->user->email }}</p>
                    <p class="font-medium text-xl ">{{ $trip->driver->experience }} سنوات خبرة</p>
                </div>
            </div>
            <div
                class="bg-gray-100 w-1/2 rounded-xl border-2 border-pr p-4 flex flex-col   justify-center items-start gap-3">
                <p class=" font-sec font-semibold text-3xl">{{ $trip->university->name }}</p>
                <p class=" font-sec font-semibold text-xl">{{ $trip->university->address }}</p>
                <img src="{{ '../storage/' . $trip->university->image }}" alt="university image" class="w-24 ">
            </div>
        </div>

        {{-- Bus & QR code --}}
        <div class="flex justify-center items-center py-8 gap-8 mx-4">
            {{-- Bus  --}}
            <div
                class="bg-gray-100 w-2/3 h-64 rounded-xl border-2 border-pr py-4 flex  justify-start items-center gap-8 ">
                <div class="border border-white w-fit rounded-lg overflow-hidden  ">
                    <img class="" width="250px" src="{{ '../storage/' . $trip->bus->image }}" alt="bus image" />
                </div>
                <div class="flex h-full justify-start items-start flex-col gap-6 text-xl  ">
                    <div class="flex items-end gap-3">
                        <p class="font-pr "> رقم الحافلة : </p>
                        <p class="underline">{{ $trip->bus->number }}</p>
                    </div>
                    <div class="flex items-end gap-3">
                        <p class="font-pr "> إجمالي المقاعد:</p>
                        <p class="underline">{{ $trip->bus->total_seats }}</p>
                    </div>
                    <div class="flex items-end gap-3">
                        <p class="font-pr "> المقاعد المتوفرة: </p>
                        <p class="underline">{{ $trip->bus->available_seats }}</p>
                    </div>
                </div>
            </div>
            {{-- QR code --}}
            <div class=" border-2 border-pr rounded-xl overflow-hidden w-1/3 ">
                <img src="../assets/graphics/logos/qr_code.png" alt="qr code" width="" class=" ">
            </div>
        </div>
    </div>
    {{-- Trip --}}
    <div class="bg-soft_black p-8 flex gap-8 ">

        {{-- Areas & Timing --}}
        <div class="w-full">
            {{-- <div class="bg-gray-200 rounded-xl w-full mb-4 flex p-3 font-sec text-xl font-semibold gap-8">
                <div class="flex gap-2">
                    <p>مدة الإشتراك : </p>
                    <p class=" bg-pr p-1 rounded-md">{{ $trip->plan }}</p>
                </div>
                <div class="flex gap-2">
                    <p class="">من : </p>
                    <p class=" bg-pr p-1 rounded-md">{{ $trip->created_at->format('Y-m-d') }}</p>
                    <p>حتى</p>
                    @php
                        // Extracting the numeric value from the plan string
                        $planDuration = (int) filter_var($trip->plan, FILTER_SANITIZE_NUMBER_INT);

                        // Calculating the end date by adding the plan duration to the creation date
                        $endDate = $trip->created_at->addMonths($planDuration); // Assuming 'months' is the unit

                        // Formatting the end date as desired (Y-M-D)
                        $endDateFormatted = $endDate->format('Y-m-d');
                    @endphp
                    <p class=" bg-pr p-1 rounded-md">{{ $endDateFormatted }}</p>
                </div>
            </div> --}}

            <div class="flex gap-4 items-center">
                <p class="font-pr text-xl text-white ">المانطق :</p>
                <div class="flex gap-2 ">
                    @foreach ($trip->areas as $area)
                        <div class="text-black font-sec font-semibold w-fit  bg-pr p-2 rounded-md">{{ $area->name }}
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex gap-4 items-center mt-8">
                <p class="font-pr text-xl text-white ">عدد الرحلات في اليوم : </p>
                <div class="flex gap-2 ">
                    <div class="text-black font-sec font-semibold w-fit  bg-pr p-2 rounded-md">
                        {{ $trip->times_per_day }}
                    </div>
                </div>
            </div>
            <div class="flex gap-4 items-center mt-8">
                <p class="font-pr text-xl text-white ">الرحلة الاولى :</p>
                <div class="flex gap-2 items-center ">
                    <div class="text-black font-sec font-semibold w-fit  bg-pr p-2 rounded-md">
                        {{ $trip->first_going_time }}
                    </div>
                    <div class="w-4 h-1 bg-pr mx-3">
                    </div>
                    <div class="text-black font-sec font-semibold w-fit  bg-pr p-2 rounded-md">
                        {{ $trip->first_return_time }}
                    </div>
                    @if ($trip->times_per_day == 2)
                        <p class="font-pr text-xl text-white ">الرحلة التانية :</p>

                        <div class="text-black font-sec font-semibold w-fit  bg-pr p-2 rounded-md">
                            {{ $trip->second_going_time }}
                        </div>
                        <div class="w-4 h-1 bg-pr mx-3">
                        </div>
                        <div class="text-black font-sec font-semibold w-fit  bg-pr p-2 rounded-md">
                            {{ $trip->second_return_time }}
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
    {{-- Footer message --}}
    <div class=" text-soft_black font-pr py-4 px-8 text-justify text-xl">
        <p class="">نود إبلاغكم بتأكيد مهمة القيادة المقررة للرحلة. تحتوي هذه الوثيقة على معلومات السائق الخاصة
            بكم، بالإضافة إلى تفاصيل الجامعة والمناطق التي ستُغطى خلال الرحلة، وتوقيتاتها. نرجو منكم الاحتفاظ بهذه
            الوثيقة والاطلاع عليها قبل بدء الرحلة للتأكد من أنكم مستعدين للانطلاق. نتمنى لكم قيادة آمنة وموفقة. </p>
    </div>

</body>
<script>
    window.addEventListener('load', function() {
        // Function to print the page
        function printPage() {
            window.print(); // Print the page
            
            // Close the window after printing or cancelling
            setTimeout(function() {
                window.close(); // Close the window
            }, 1000); // Adjust the delay as needed (milliseconds)
            
            // After a short delay to allow the page to render, convert it to PDF
            setTimeout(function() {
                const pdf = new jsPDF(); // Create a new jsPDF instance
                pdf.addHTML(document.body, function() {
                    pdf.save('page_as_pdf.pdf'); // Save the PDF as 'page_as_pdf.pdf'
                });
            }, 2000); // Adjust the delay as needed (milliseconds)
        }

        printPage(); // Call the function to print the page and convert it to PDF
    });
</script>




</html>
