<x-mainpage>
    <section class="ec-messages-section">
        <div class="container">
            <div class="ec-messages-header">
                <div>
                    <span class="ec-section-label">COMMUNICATION CENTER</span>
                    <h1>Messages</h1>
                    <p>Manage and review messages submitted through the contact form.</p>
                </div>

                <div class="ec-messages-header-icon">
                    ✉
                </div>
            </div>

            <div class="ec-messages-card">
                <div class="ec-messages-card-header">
                    <div>
                        <span class="ec-section-label">INBOX</span>
                        <h2>Received messages</h2>
                        <p>Contact form submissions</p>
                    </div>

                    <span class="ec-messages-count">
                        {{ count($message_array) }} messages
                    </span>
                </div>

                <div class="ec-messages-table-wrapper">
                    <table class="ec-messages-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($message_array as $message)
                                <tr>
                                    <td>
                                        <span class="ec-message-date">
                                            {{ $message->created_at->format('Y-m-d H:i') }}
                                        </span>
                                    </td>

                                    <td>
                                        <div class="ec-message-name">
                                            {{ $message->full_name }}
                                        </div>
                                    </td>

                                    <td>
                                        <a
                                            class="ec-message-email"
                                            href="mailto:{{ $message->email_address }}"
                                        >
                                            {{ $message->email_address }}
                                        </a>
                                    </td>

                                    <td>
                                        <div class="ec-message-content">
                                            {{ $message->message }}
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <div class="ec-messages-empty">
                                            <div class="ec-messages-empty-icon">
                                                ✉
                                            </div>

                                            <h3>No messages yet</h3>

                                            <p>
                                                Contact form submissions will appear here.
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-mainpage>