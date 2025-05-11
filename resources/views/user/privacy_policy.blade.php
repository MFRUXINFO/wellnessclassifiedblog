@extends('user.layout.app')
@section('meta')
    <title>Forgot Password Page</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
@endsection
@section('content')
<!-- Advertwise banner section -->

<!-- terms and conditions section start -->
<section class="category-card-top my-3  py-3  px-3">
    <div class="category-header text-center phone-header">
        <div>
            <h1 class=" h1-header">Privacy Policy</h1>
        </div>
    </div>
    <div class="px-3 pt-3">
        <p class="text-theme">Welcome to Drive Classified! Your privacy is important to us, and we are committed to protecting the information you share with us. This Privacy Policy outlines how we collect, use, disclose, and safeguard your personal information. By accessing or using our website, you consent to the practices described in this policy.</p>

        <div>
            <h4 class="h1-header">Information Collection :</h4>
            <p class="text-theme">We may collect various types of information from users, including personally identifiable information such as your name, email address, and contact details when you register for an account. Additionally, we may gather non-personal information, such as browser type, IP address, and usage patterns, to enhance the user experience and improve our services.</p>
        </div>
        <div>
            <h4 class="h1-header">Use of Information :</h4>
            <p class="text-theme">The information we collect is used to provide and improve our services, personalize user experience, and communicate with you about your account or relevant updates. We may also use aggregated, anonymized data for analytical purposes to better understand user behavior and preferences.</p>
        </div>
        <div>
            <h4 class="h1-header">Sharing of Information :</h4>
            <p class="text-theme">We do not sell, trade, or rent your personal information to third parties without your explicit consent. However, we may share information with trusted service providers who assist us in operating our website or conducting our business, always ensuring that they adhere to the same level of data protection as we do.</p>
        </div>
        <div>
            <h4 class="h1-header">Security Measures :</h4>
            <p class="text-theme">We employ industry-standard security measures to protect your information from unauthorized access, disclosure, alteration, and destruction. However, no method of transmission over the internet or electronic storage is completely secure, and we cannot guarantee absolute security.</p>
        </div>
        <div>
            <h4 class="h1-header">Policy Changes :</h4>
            <p class="text-theme">We reserve the right to update this Privacy Policy periodically to reflect changes in our practices or applicable laws. We encourage you to review this page regularly for any updates.</p>
        </div>
    </div>
</section>

<!-- terms and conditions section end -->
@endsection
@push('js')
    <script>
        $('.privacy_policy').addClass('active');
    </script>
@endpush
