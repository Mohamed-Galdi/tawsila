<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تأكيد الإشتراك</title>
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
        <p class="font-pr text-center text-5xl">وصل تأكيد الإشتراك </p>
        <img src="../assets/graphics/logos/qr_code.png" alt="qr code" class="size-24  ">
    </div>
    <div class="bg-white">
        {{-- Student & University --}}
        <div class="pt-8 px-4 flex gap-3 justify-between">
            <div class="bg-gray-100 w-1/2 rounded-xl border-2 border-pr p-4 flex  justify-start items-center gap-8">

                <img src="{{ '../storage/' . $subscription->student->user->image }}" alt="student image"
                    class="size-24 rounded-full">
                <div class=" font-sec  ">
                    <p class="font-semibold text-3xl mb-3">{{ $subscription->student->user->name }}</p>
                    <p class="font-medium text-xl ">{{ $subscription->student->user->email }}</p>
                </div>
            </div>
            <div
                class="bg-gray-100 w-1/2 rounded-xl border-2 border-pr p-4 flex flex-col   justify-start items-center gap-3">
                <p class=" font-sec font-semibold text-3xl">{{ $subscription->trip->university->name }}</p>
                <img src="{{ '../storage/' . $subscription->trip->university->image }}" alt="university image"
                    class="w-24 ">
            </div>
        </div>

        {{-- QR code --}}
        <div class="flex justify-center items-center py-8">
            <div class=" border-2 border-pr rounded-xl overflow-hidden">
                <img src="../assets/graphics/logos/qr_code.png" alt="qr code" width="150px" class=" ">
            </div>
        </div>
    </div>
    {{-- Trip --}}
    <div class="bg-soft_black p-8 flex gap-8 ">
        {{-- Bus & Driver --}}
        <div class="border border-white w-fit rounded-lg overflow-hidden">
            <div class="w-full p-2 flex justif items-center gap-2">
                <img class="rounded-full" width="50px"
                    src="{{ '../storage/' . $subscription->trip->driver->user->image }}" alt="bus image" />
                <div>
                    <p class="text-white font-pr ">{{ $subscription->trip->driver->user->name }}</p>
                    <p class="text-white font-sec ">{{ $subscription->trip->driver->experience }} سنوات خبرة</p>
                </div>

            </div>
            <img class="" width="250px" src="{{ '../storage/' . $subscription->trip->bus->image }}"
                alt="bus image" />
        </div>

        {{-- Areas & Timing --}}
        <div class="w-full">
            <div class="bg-gray-200 rounded-xl w-full mb-4 flex p-3 font-sec text-xl font-semibold gap-8">
                <div class="flex gap-2">
                    <p>مدة الإشتراك : </p>
                    <p class=" bg-pr p-1 rounded-md">{{ $subscription->plan }}</p>
                </div>
                <div class="flex gap-2">
                    <p class="">من : </p>
                    <p class=" bg-pr p-1 rounded-md">{{ $subscription->created_at->format('Y-m-d') }}</p>
                    <p>حتى</p>
                    @php
                        // Extracting the numeric value from the plan string
                        $planDuration = (int) filter_var($subscription->plan, FILTER_SANITIZE_NUMBER_INT);

                        // Calculating the end date by adding the plan duration to the creation date
                        $endDate = $subscription->created_at->addMonths($planDuration); // Assuming 'months' is the unit

                        // Formatting the end date as desired (Y-M-D)
                        $endDateFormatted = $endDate->format('Y-m-d');
                    @endphp
                    <p class=" bg-pr p-1 rounded-md">{{ $endDateFormatted }}</p>
                </div>
            </div>

            <div class="flex gap-4 items-center">
                <p class="font-pr text-xl text-white ">المانطق :</p>
                <div class="flex gap-2 ">
                    @foreach ($subscription->trip->areas as $area)
                        <div class="text-black font-sec font-semibold w-fit  bg-pr p-2 rounded-md">{{ $area->name }}
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex gap-4 items-center mt-8">
                <p class="font-pr text-xl text-white ">عدد الرحلات في اليوم : </p>
                <div class="flex gap-2 ">
                    <div class="text-black font-sec font-semibold w-fit  bg-pr p-2 rounded-md">
                        {{ $subscription->trip->times_per_day }}
                    </div>
                </div>
            </div>
            <div class="flex gap-4 items-center mt-8">
                <p class="font-pr text-xl text-white ">الرحلة الاولى :</p>
                <div class="flex gap-2 items-center ">
                    <div class="text-black font-sec font-semibold w-fit  bg-pr p-2 rounded-md">
                        {{ $subscription->trip->first_going_time }}
                    </div>
                    <div class="w-4 h-1 bg-pr mx-3">
                    </div>
                    <div class="text-black font-sec font-semibold w-fit  bg-pr p-2 rounded-md">
                        {{ $subscription->trip->first_return_time }}
                    </div>
                    @if ($subscription->trip->times_per_day == 2)
                        <p class="font-pr text-xl text-white ">الرحلة التانية :</p>

                        <div class="text-black font-sec font-semibold w-fit  bg-pr p-2 rounded-md">
                            {{ $subscription->trip->second_going_time }}
                        </div>
                        <div class="w-4 h-1 bg-pr mx-3">
                        </div>
                        <div class="text-black font-sec font-semibold w-fit  bg-pr p-2 rounded-md">
                            {{ $subscription->trip->second_return_time }}
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
    {{-- Footer message --}}
    <div class=" text-soft_black font-pr py-4 px-8 text-justify  h-96 text-xl">
        <p class="">
            نود إبلاغكم بتأكيد اشتراككم في الرحلة المقررة. تحتوي هذه الوثيقة على معلومات مهمة تتعلق بالطالب والجامعة،
            بالإضافة إلى تفاصيل الحافلة والسائق والمناطق التي ستُغطى خلال الرحلة. كما تتضمن الوثيقة رمزًا ثنائي الأبعاد
            (QR Code) الذي يسهل الوصول إلى موقعنا الإلكتروني لمزيد من المعلومات والتفاصيل. نرجو منكم الاحتفاظ بهذه
            الوثيقة وإحضارها معكم خلال الرحلة للإشارة إليها عند الحاجة. نتمنى لكم رحلة آمنة وممتعة.
        </p>
    </div>

</body>
<script>
    window.addEventListener('load', function() {
        // Function to print the page
        function printPage() {
            window.print(); // Print the page

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
