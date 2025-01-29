<!-- resources/views/faq.blade.php -->
<x-app-layout>
    <style>
        .faq-page {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .header {
            text-align: center;
            padding: 40px;
            background: var(--bg-color);
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .header h1 {
            font-size: 32px;
            margin-bottom: 16px;
        }

        .header p {
            font-size: 16px;
        }

        .section {
            background: var(--bg-color);

            border-radius: 8px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            background: var(--bg-color);

            font-size: 24px;
            font-weight: bold;
            padding-bottom: 15px;
            margin-bottom: 25px;
            border-bottom: 2px solid #2c5282;
        }

        .question-block {
            margin-bottom: 25px;
        }

        .question {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .answer {
            line-height: 1.6;
            padding-left: 20px;
        }

        .answer ul {
            list-style-type: disc;
            margin-left: 20px;
            margin-top: 10px;
        }

        .answer li {
            margin-bottom: 8px;
        }



        .highlight {
            font-weight: 600;
            color: var(--primary-color);
        }
    </style>

    <div class="faq-page">
        <div class="header">
            <h1>Tech Horizons FAQ</h1>
            <p>Find answers to frequently asked questions about our online technology magazine</p>
        </div>

        <!-- General Information -->
        <div class="section">
            <h2 class="section-title">General Information</h2>

            <div class="question-block">
                <div class="question">What is Tech Horizons?</div>
                <div class="answer">
                    Tech Horizons is an online magazine dedicated to exploring cutting-edge technological innovations
                    and their societal impact. We cover topics including Artificial Intelligence, Internet of Things,
                    Cybersecurity, Virtual and Augmented Reality, and more.
                </div>
            </div>

            <div class="question-block">
                <div class="question">What topics does Tech Horizons cover?</div>
                <div class="answer">
                    Our main topics include:
                    <ul>
                        <li>Artificial Intelligence</li>
                        <li>Internet of Things (IoT)</li>
                        <li>Cybersecurity</li>
                        <li>Virtual and Augmented Reality</li>
                        <li>Other emerging technologies</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- User Access -->
        <div class="section">
            <h2 class="section-title">User Access & Roles</h2>

            <div class="question-block">
                <div class="question">What are the different types of users?</div>
                <div class="answer">
                    <ul>
                        <li><span class="highlight">Guest:</span> Can view theme information and public issues, submit
                            subscription requests.</li>
                        <li><span class="highlight">Subscriber:</span> Access to all magazine issues, theme management,
                            browsing history, and article submission.</li>
                        <li><span class="highlight">Theme Manager:</span> Manages theme subscriptions, moderates
                            discussions, and reviews article submissions.</li>
                        <li><span class="highlight">Editor:</span> Full control over issues, user management, and
                            content publication.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Features -->
        <div class="section">
            <h2 class="section-title">Features & Functionality</h2>

            <div class="question-block">
                <div class="question">What features are available for subscribers?</div>
                <div class="answer">
                    <ul>
                        <li>Access to all magazine issues</li>
                        <li>Theme subscription management</li>
                        <li>Article submission with status tracking</li>
                        <li>Article rating system (1-5 stars)</li>
                        <li>Participation in article discussions</li>
                        <li>Personalized article recommendations</li>
                        <li>Browsing history with filters</li>
                    </ul>
                </div>
            </div>

            <div class="question-block">
                <div class="question">How does the article recommendation system work?</div>
                <div class="answer">
                    The system analyzes your browsing history, theme subscriptions, and article ratings to suggest
                    content that matches your interests. Recommendations are updated regularly to reflect your latest
                    interactions with the platform.
                </div>
            </div>
        </div>

        <!-- Content Management -->
        <div class="section">
            <h2 class="section-title">Content & Publication</h2>

            <div class="question-block">
                <div class="question">What is the article submission process?</div>
                <div class="answer">
                    Article submissions go through the following stages:
                    <ul>
                        <li>Initial submission by subscriber</li>
                        <li>Review by Theme Manager</li>
                        <li>Status updates (Pending, Accepted, Rejected, Published)</li>
                        <li>Publication in upcoming magazine issue if accepted</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
