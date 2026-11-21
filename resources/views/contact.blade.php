<x-mainpage>
    <section class="ec-contact-section">
        <div class="container">
            <div class="ec-contact-heading">
                <span class="ec-section-label">CONTACT</span>

                <h1>
                    Let's talk.
                    <span>We're listening.</span>
                </h1>

                <p>
                    Have a question, feedback, or suggestion?
                    Send us a message and we will get back to you.
                </p>
            </div>

            <div class="ec-contact-layout">
                <div class="ec-contact-info">
                    <div class="ec-contact-info-top">
                        <div class="ec-contact-icon">
                            ✦
                        </div>

                        <h2>We'd love to hear from you!</h2>

                        <p>
                            Your feedback is important to the E-Crayon team.
                            If you have encountered an issue or have an idea
                            for improvement, feel free to contact us.
                        </p>
                    </div>

                    <div class="ec-contact-info-item">
                        <div class="ec-contact-info-icon">
                            💬
                        </div>

                        <div>
                            <strong>Send us a message</strong>
                            <span>
                                Describe your question or issue in detail.
                            </span>
                        </div>
                    </div>

                    <div class="ec-contact-info-item">
                        <div class="ec-contact-info-icon">
                            🔒
                        </div>

                        <div>
                            <strong>Privacy first</strong>
                            <span>
                                Your information is only used for handling your inquiry.
                            </span>
                        </div>
                    </div>

                    <div class="ec-contact-info-item">
                        <div class="ec-contact-info-icon">
                            ⚡
                        </div>

                        <div>
                            <strong>Easy contact</strong>
                            <span>
                                You do not need to sign in to send a message.
                            </span>
                        </div>
                    </div>

                    <div class="ec-contact-info-bottom">
                        <span class="ec-contact-info-bottom-dot"></span>
                        <span>We're here to help</span>
                    </div>
                </div>

                <div class="ec-contact-form-card">
                    <div class="ec-contact-form-header">
                        <span class="ec-section-label">YOUR MESSAGE</span>
                        <h2>Send a Message</h2>
                        <p>Fill in the fields below to contact us.</p>
                    </div>

                    @if (session('success'))
                        <div class="ec-contact-success">
                            <span>✓</span>

                            <div>
                                <strong>Your message has been sent successfully!</strong>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ url('/contact') }}" class="ec-contact-form">
                        @csrf

                        <div class="ec-contact-field">
                            <label for="full_name">Full Name</label>

                            <input
                                type="text"
                                id="full_name"
                                name="full_name"
                                placeholder="Enter your full name"
                                value="{{ old('full_name', auth()->user()->name ?? '') }}"
                                class="@error('full_name') ec-contact-input-error @enderror"
                            >

                            @error('full_name')
                                <span class="ec-contact-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="ec-contact-field">
                            <label for="email_address">Email Address</label>

                            <input
                                type="email"
                                id="email_address"
                                name="email_address"
                                placeholder="example@email.com"
                                value="{{ old('email_address', auth()->user()->email ?? '') }}"
                                class="@error('email_address') ec-contact-input-error @enderror"
                            >

                            @error('email_address')
                                <span class="ec-contact-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="ec-contact-field">
                            <label for="message">Message</label>

                            <textarea
                                id="message"
                                name="message"
                                rows="6"
                                placeholder="Write your message here..."
                                class="@error('message') ec-contact-input-error @enderror"
                            >{{ old('message') }}</textarea>

                            @error('message')
                                <span class="ec-contact-error">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="ec-contact-submit">
                            <span>Send Message</span>
                            <span class="ec-contact-submit-arrow">→</span>
                        </button>

                        <p class="ec-contact-form-note">
                            By submitting this form, you agree to the use of your
                            information for handling your inquiry.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-mainpage>