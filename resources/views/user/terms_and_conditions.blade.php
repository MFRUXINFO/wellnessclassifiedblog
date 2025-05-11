@extends('user.layout.app')
@section('meta')
    <title>Terms & Conditions Page</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
@endsection
@section('content')


<!-- terms and conditions section start -->
<section class="category-card-top my-3  py-3  px-3">
    <div class="category-header text-center phone-header">
        <div>
            <h1 class=" h1-header">Terms and Conditions</h1>
        </div>
    </div>
    <div class="px-3 pt-3">
        <p class="text-theme">Welcome to Drive Classified, a platform designed to facilitate buying and selling within our community. By accessing and using our services, you agree to comply with the terms and conditions outlined below.</p>

        <div>
            <h4 class="h1-header">1. User Conduct :</h4>
            <p class="text-theme">When utilizing our platform, users are expected to conduct themselves in a manner that respects the community. This includes providing accurate information, refraining from fraudulent activities, and adhering to our guidelines regarding content and communication.</p>
        </div>
        <div>
            <h4 class="h1-header">2. Account Responsibility :</h4>
            <p class="text-theme">Users are responsible for maintaining the confidentiality of their account information, including usernames and passwords. Any activities that occur under your account are your responsibility. If you suspect unauthorized access, it is your obligation to notify us immediately.</p>
        </div>
        <div>
            <h4 class="h1-header">3. Listing Policies :</h4>
            <p class="text-theme">All listings must adhere to our guidelines, ensuring accuracy and transparency. Prohibited items, services, and activities are clearly outlined in our policies. Users engaging in the sale or promotion of restricted content may face account suspension or termination.</p>
        </div>
        <div>
            <h4 class="h1-header">4. Privacy and Security :</h4>
            <p class="text-theme">We prioritize the privacy and security of our users. Personal information is handled according to our Privacy Policy, and users are encouraged to review and understand our data handling practices.</p>
        </div>
        <div>
            <h4 class="h1-header">5. Prohibited Activities :</h4>
            <p class="text-theme">Engaging in any form of prohibited activities, including but not limited to hacking, spamming, or the distribution of malicious software, is strictly prohibited. Violation of these terms may result in legal action and termination of your account.</p>
        </div>
        <div>
            <h4 class="h1-header">6. Communication and Feedback :</h4>
            <p class="text-theme">Our platform encourages open communication between users. However, any form of harassment, abuse, or unsolicited commercial communication is not tolerated. Users are encouraged to utilize our reporting and blocking features to address such issues.</p>
        </div>
        <div>
            <h4 class="h1-header">7. Intellectual Property :</h4>
            <p class="text-theme">Users retain ownership of their intellectual property. By using our platform, you grant us a non-exclusive, royalty-free license to use, display, and distribute the content you submit. This license is solely for the purpose of operating and improving our services.</p>
        </div>
        <div>
            <h4 class="h1-header">8. Termination of Services :</h4>
            <p class="text-theme">We reserve the right to terminate or suspend your account without prior notice if there is a breach of these terms or if your conduct raises concerns about legal compliance or the safety of our community.</p>
        </div>
        <div>
            <h4 class="h1-header">9. Modifications to Terms :</h4>
            <p class="text-theme">We may update and modify these terms periodically. Users are responsible for staying informed about changes, and continued use of our platform constitutes acceptance of the updated terms.</p>
        </div>
        <div>
            <p class="text-theme">By using Drive Classified, you acknowledge that you have read, understood, and agreed to abide by these terms and conditions. If you have any questions or concerns, please contact our support team.</p>
        </div>

    </div>
</section>

<!-- terms and conditions section end -->
@endsection
@push('js')
    <script>
        $('.terms_and_conditions').addClass('active');
    </script>
@endpush
