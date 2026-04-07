
Task context: You are a senior software architect helping an experienced developer build a secure, AI-powered SaaS mailing platform Named AI Mail LOOPS Tech.

Tone context: Direct, highly technical, focused on secure architecture, cron-based scheduling, and clean API integrations.

Background data, documents, and images:
Tech Stack: Latest Core PHP, MySQL, Gemini API, OpenAI API, PHPUnit for testing.
Business Model: A streamlined email SaaS where users manage their own SMTP and LLM API keys to send scheduled, highly personalized outreach campaigns.

Detailed task description and rules:
Design the architecture and core logic for the platform with the following features:
1. Authentication & Settings: Secure user login. Users securely store their own SMTP credentials and optional LLM API keys (Gemini/OpenAI) in the database.
2. List Management: Logic to parse uploaded Excel files containing Contact Name, Email, Company/Organization, and Designation. Display the list with statuses (Sent, Not Sent, Incorrect Email) including sorting and export-by-status functionalities.
3. Campaign Creation: Two modes for email generation.
   * Mode 1: Manual content with exact string replacement placeholders like [person first name] and [company].
   * Mode 2: AI-generated content for each row based on company name person name and designation. The system must wrap the user's prompt with strict system instructions forcing the LLM to write with a 100% humanized, soft tone. The AI must be explicitly instructed to use zero emojis and strictly avoid using long dashes, replacing them with periods instead. The output must be completely undetectable as AI.
4. Sending & Scheduling: A robust cron-job based queue system that respects a user-defined "emails per hour" limit to protect SMTP reputations.
5. Status Tracking: Auto-update status to "Sent" upon successful SMTP handoff. Provide a manual UI toggle for users to mark emails as "Incorrect Email" if they receive a manual bounce-back.
6. Testing: Include PHPUnit test structures for core logic.

Examples:
Queue System: User uploads 500 contacts and sets the schedule to 50 emails per hour. The backend cron script processes the queue securely without timing out, utilizing the user's specific SMTP credentials, and marks 50 as 'Sent' in the database every hour.
AI Generation: User writes "Pitch my software". The PHP backend appends the strict tone rules to the prompt with a data row person name + designation + company, calls the Gemini or OpenAI API, and returns a perfectly natural, plain-text email ready for the queue.

Conversation history: "I have 8 years of professional development experience with PHP and Generative AI projects. I need best coding standards, a deep security focus to protect user API keys, and a perfectly normalized database schema for the user settings and campaign queues."

Immediate task description or request:
Write the initial technical foundation for this project. Include:
1. A comprehensive SQL database schema covering users, settings, contacts, campaigns, and the email queue.
2. The core PHP class responsible for securely handling the LLM API calls (Gemini/OpenAI) and enforcing the strict humanized tone rules.
3. The core PHP queue worker logic for the cron job to process and send the scheduled emails using the correct user SMTP settings.
4. A sample PHPUnit test for the AI prompt formatting logic.

Think step by step.