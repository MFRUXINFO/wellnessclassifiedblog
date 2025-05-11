@extends('user.layout.app')
@section('meta')
    <title>Refund Policy Page</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
@endsection
@section('content')

    <!-- Refund Policy section start -->
    <section class="category-card-top my-3  py-3  px-3">
        <div class="category-header text-center phone-header">
            <div>
                <h1 class=" h1-header">Refund Policy</h1>
            </div>
        </div>
        <div class="px-3 pt-3">
            <p class="text-theme">Thank you for using our classified website services. We strive to provide a seamless and satisfactory experience for our users. This Refund Policy outlines the terms and conditions governing refunds for any transactions conducted through our platform.</p>

            <div>
                <h4 class="h1-header">1. Refund Eligibility :</h4>
                <p class="text-theme"> - Refunds are applicable only in cases where there has been an error or technical issue on our part that prevents the successful completion of a transaction.</p>
                <p class="text-theme">    - Users must report any issues within 7 days of the transaction date to be eligible for a refund.</p>
            </div>
            <div>
                <h4 class="h1-header">2. Non-Refundable Items :</h4>
                <p class="text-theme">   - Certain services or features offered on our platform may be non-refundable. Users are advised to carefully review the product or service details before making a purchase.</p>
            </div>
            <div>
                <h4 class="h1-header">3. Refund Process :</h4>
                <p class="text-theme">   - To initiate a refund, users must contact our customer support team at [contact email/phone number] and provide detailed information about the transaction, including the issue faced.</p>
                <p class="text-theme">    - Our team will investigate the matter and, if the refund is deemed appropriate, will process it within 14 business days.</p>
            </div>
            <div>
                <h4 class="h1-header">4. Payment Method :</h4>
                <p class="text-theme">   - Refunds will be issued using the same payment method used for the original transaction. If this is not possible, alternative arrangements will be made.</p>
            </div>
            <div>
                <h4 class="h1-header">5. Refund Amount :</h4>
                <p class="text-theme">   - Refund amounts will be limited to the value of the original transaction. Any associated fees, including but not limited to transaction fees, processing fees, or service charges, may not be refundable.</p>
            </div>
            <div>
                <h4 class="h1-header">6. Policy Amendments :</h4>
                <p class="text-theme">   - We reserve the right to update or modify this Refund Policy at any time without prior notice. Users are encouraged to review this policy periodically to stay informed about any changes.</p>
            </div>
            <div>
                <h4 class="h1-header">7. Contact Us :</h4>
                <p class="text-theme">    - For any questions or concerns regarding our Refund Policy, please contact our customer support team at [contact email/phone number].</p>
            </div>
            <div>
                <p class="text-theme">We appreciate your understanding and cooperation. Our goal is to ensure a positive experience for all users of our classified website.</p>
            </div>
        </div>
    </section>

    <!-- Refund Policy section end -->
@endsection
@push('js')
    <script>
        $('.refund_policy').addClass('active');
    </script>
@endpush
