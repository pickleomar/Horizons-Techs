# Horizons Techs

## 📌 Project Overview
Horizons Tech is a dynamic web application built with Laravel 9.x, aimed at delivering a seamless user experience for managing subscriptions, proposing articles, and tracking user activity. This project leverages Laravel’s powerful features to create a robust and scalable platform for content management and engagement.

## ✨ Features
- 🔐 **User Authentication**: Secure login & registration.
- 🎭 **Role-Based Access Control (RBAC)**: Different user roles (Admin, Editor, User) with specific permissions.
- 🎨 **Theme Management**: Users can subscribe to different themes.
- 📝 **Article Management**: Articles are categorized and displayed based on user roles.
- ⚡ **Security & Performance**: Secure handling of user roles and optimized database queries.

## Presentation of the project

## Screenshots

### Home Page
The home page consists of:
- A **header** with navigation and authentication links.
- A **hero section** introducing the platform.
- Links to **public articles**.
- A section displaying **featured themes**.
- A **footer** with additional links and information.
  
![Page Principale_1](https://github.com/user-attachments/assets/13eb8c30-4001-4b8f-9e0d-c5cfcfb51854)

### Themes Page
The **Themes Page** displays a collection of magazine themes available on the platform. It includes:
- A grid layout showcasing various **magazine themes**.
- Each theme has a **thumbnail, title, and description**.
- Options to **view details, preview, or subscribe** to a theme.

![Exploration des themes](https://github.com/user-attachments/assets/d115089e-c17b-42f9-baaa-61a28e56377f)

### Theme Details Page  
The **Theme Details Page** provides comprehensive information about a specific theme, including subscription options and article access based on user roles.  

#### Features:  
- Displays **all details** about the theme.  
- **Subscribe button** for users who are not yet subscribed.  
- **Subscribers list**, including editors and other theme admins.  
- **Editor is subscribed by default**.  
- **Delete button** available for **theme admins and editors** to remove the theme.  
- **Articles section** that is **visible only to subscribed members**.  

#### UI Overview:  
- **Theme Information:** Title, description, created by, category, etc.  
- **Subscription Actions:** Users can subscribe if they haven’t yet.  
- **Admin Actions:** Theme admins and editors can delete the theme.  
- **Articles Section:** Displays articles exclusive to subscribers.  

#### Screenshots:  

![theme explore](https://github.com/user-attachments/assets/448fa43c-719b-4766-a77b-c0049c4e7378)



### Authentication Pages  
The **Authentication Pages** allow users to log in or register securely. They include:  

#### Login Page  
- A **login form** with fields for email and password.  
- **"Remember me"** option for persistent sessions.  
- **Google and GitHub authentication** for quick access.  
- A link to reset the password.  

![Page de Connexion](https://github.com/user-attachments/assets/87bc3218-2633-49c9-a0da-c969c9342b97)


#### Registration Page  
- A **registration form** with fields for name, email, password, and confirmation.  
- **Google and GitHub authentication** for easy sign-up.  
- Validation messages for user-friendly input.  

![Page D'inscription](https://github.com/user-attachments/assets/21c0c066-c3de-4780-96f0-dd9186d43824)

### Public Articles Page  
The **Public Articles Page** showcases articles that have been **approved** and made public by their authors. These articles are accessible to **guests and unauthenticated users**.  

#### Features:  
- Displays a **list of approved articles** that are set to be public.  
- Accessible by **all users**, including **guests and unauthenticated visitors**.  
- Each article includes:  
  - **Title**  
  - **Excerpt/short description**  
  - **Author’s name**  
  - **Publication date**  
- **Read More** button to view the full article.  

#### UI Overview:  
- **Article Listing:** Publicly available articles displayed in a structured format.  
- **Navigation Links:** Easy access to other sections of the platform.  
- **Guest Accessibility:** No authentication required to view articles.  

#### Screenshots:  

![Articles Public](https://github.com/user-attachments/assets/ef67782c-a6a8-4539-8363-719bd8f1b001)

### Article Page  
The **Article Page** displays the full details of an article, including its content, author, and interactions such as ratings and comments.  

#### Features:  
- **Article Details:**  
  - **Title**  
  - **Content** (full article body)  
  - **Author’s name**  
  - **Publication date**  
  - **Theme** the article belongs to  
- **Rating System:**  
  - Users can **submit a rating** for the article.  
- **Comment Section:**  
  - Users can **add comments** to discuss the article.  
  - Each comment displays:  
    - Commenter’s name  
    - Timestamp  
    - Comment content  
  - **Delete button** for each comment, accessible by **Theme Admin** and **Editor**.  
- **Article Management:**  
  - **Delete button** for the article, accessible by **Theme Admin** and **Editor**.  

#### UI Overview:  
- **Article Display:** Full content with metadata.  
- **Rating Input:** Users can provide feedback through a rating system.  
- **Comment System:** Discussion and interaction among readers.  
- **Admin Controls:** Delete options for theme admins and editors.  

#### Screenshots:  
![page article_1](https://github.com/user-attachments/assets/333c0b8d-a659-4bd3-8ccc-b6ffadf80168)
![page article_2](https://github.com/user-attachments/assets/0378aef2-e3a4-49cc-934e-4b832120a59a)

## Dashboard Page  
The **Dashboard Page** is the user’s control center, where they can manage their content and perform various actions based on their role. It includes an **aside** section that provides quick access to available actions for the current user.  

### Features:  
- **Aside Section:**  
  - Displays a menu of **actions the user can perform**, such as:  
    - **Manage Themes** (create, edit, or delete themes)  
    - **View Subscriptions** (access and manage subscriptions)  
    - **Manage Articles** (create, edit, or delete articles)  
    - **Account Settings** (update personal details and preferences)  
- **Main Content Area:**  
  - Displays a dashboard overview of the user’s activity and content.  
  - **Action Buttons** or forms based on the user’s permissions and role (e.g., admin, editor, subscriber).  

### UI Overview:  
- **Aside Section:**  
  - Contains links or buttons for actions based on the user’s permissions.  
  - May include dynamic sections based on the user's role (e.g., admin-specific actions).  
- **Main Area:**  
  - Shows relevant information, such as user stats, recent activity, and tasks.  
  - Allows users to interact with their content (e.g., add a new article or theme).  

### Screenshots:  
![dashboard](https://github.com/user-attachments/assets/13540346-7fae-4608-867d-6e7c4d5b736c)
![aprové ou reject un subscription](https://github.com/user-attachments/assets/a990a71b-eaea-45ca-b428-6560c1a45a16)
![historique de navigation](https://github.com/user-attachments/assets/f7a74804-0f35-4dd5-80e6-b4b622955202)
![Les Article d'utilisateur](https://github.com/user-attachments/assets/8d5bd081-22fd-4384-9cf5-8db57e64ef5b)
![management des numero (editeur seulement)](https://github.com/user-attachments/assets/b952db68-8bb8-4e5a-8a26-d9181ce76d21)
![management des themes](https://github.com/user-attachments/assets/e4171603-7cf9-40ed-91ee-47d9ae2fa7e5)
![profile](https://github.com/user-attachments/assets/4d610175-c219-4af0-90df-8ccf68287887)


## Issue Page  
The **Issue Page** displays a collection of previous issues published by the magazine. Users can view details of each issue and explore its content.

### Features:  
- **List of Previous Issues:**  
  - Displays a chronological list of **published issues**.  
  - Each issue includes:  
    - **Title** of the issue  
    - **Cover image** or thumbnail  
    - **Release date**  
    - **Short description** of the content  
- **Access to Articles:**  
  - Users can view and read articles published in each issue.  
  - Articles may be accessible to all users or limited based on the subscription.  

### UI Overview:  
- **Issue Listing:**  
  - Each issue is represented by a card or tile with essential details like title, cover, and description.  
  - Clicking on an issue allows users to access detailed information about it.  
- **Navigation Links:**  
  - Quick links to navigate to other pages or issues within the magazine.  

### Screenshots:  

![page de numero ](https://github.com/user-attachments/assets/6d736552-d5f7-4dfb-967e-b29779553cc7)

## Single Issue Page  
The **Single Issue Page** displays all the details about a specific issue, including its content and a list of articles published within that issue.

### Features:  
- **Issue Information:**  
  - **Title** of the issue  
  - **Cover image** or thumbnail  
  - **Release date**  
  - **Short description** of the issue’s content  
- **Articles Section:**  
  - Lists all the articles included in the issue. Each article includes:  
    - **Title** of the article  
    - **Author’s name**  
    - **Article excerpt** or brief description  
    - **Link to full article**  
- **Pagination or Navigation:**  
  - If there are many articles, the page may have pagination or links to navigate between sections of the issue.

### UI Overview:  
- **Issue Overview:**  
  - At the top of the page, users can see the cover, title, and description of the issue.  
- **Articles Listing:**  
  - Each article in the issue is listed below the issue details, providing access to the full content.  
- **Article Access:**  
  - Users can click on the article titles to view them in detail. Access to articles may be determined by the user's subscription status.

### Screenshots:  
![les information d'un numero](https://github.com/user-attachments/assets/257c3ece-508e-4c7e-b445-717cbde40329)

## Issue Management Page  
The **Issue Management Page** allows admins and editors to manage both published and unpublished issues. Users can edit issue content, add or remove articles, and perform administrative actions like deleting issues.

### Features:  
- **List of Issues:**  
  - Displays a list of **published** and **unpublished** issues.  
  - For each issue, details include:  
    - **Title**  
    - **Cover image**  
    - **Release date**  
    - **Status** (published or unpublished)  
    - **Number of articles**  
- **Edit Functionality:**  
  - Admins and editors can **edit an issue** to update details like title, description, and cover image.  
  - **Add or Remove Articles:**  
    - Admins can add new articles to the issue or remove existing ones.  
    - A button or form allows articles to be linked to an issue.  
- **Delete Options:**  
  - A **delete button** for each issue, allowing admins and editors to remove issues.  
  - Deleting an issue will remove it from the platform and its associated articles.  
- **Search or Filter Options:**  
  - Option to filter by issue status, date, or title.

### UI Overview:  
- **Issue Listing:**  
  - A table or card layout showing published and unpublished issues.  
  - **Edit** and **Delete** buttons are available next to each issue for administrative actions.  
- **Action Buttons:**  
  - Buttons for adding/removing articles, editing issue details, and deleting the issue.  
- **Status Indicators:**  
  - A clear indication of whether the issue is **published** or still in draft form.  

### Screenshots:  
![creation nouveaux numero](https://github.com/user-attachments/assets/49cf273f-e84a-414f-95a9-b8d5c2a00924)
![proposed articles](https://github.com/user-attachments/assets/69014ff4-8193-487f-b215-65c5670d2eb7)
![management des numero (editeur seulement)](https://github.com/user-attachments/assets/cce5e842-cc77-4aa8-9108-55a56566c953)

## Subscription and Article Requests Management  
This section of the **Dashboard Page** is accessible by **Theme Admins** and **Editors** and allows them to manage **subscription requests** and **article requests** submitted by users.

### Features:  
- **Subscription Requests Management:**  
  - Displays a list of users who have **requested a subscription** to a theme.  
  - Admins and editors can approve or reject subscription requests.  
  - Each request includes:  
    - **User name**  
    - **Request date**  
    - **Status** (pending, approved, or rejected)  
- **Article Requests Management:**  
  - Displays a list of articles that are **pending approval** or have been **submitted for review**.  
  - Admins and editors can approve, reject, or request edits on articles.  
  - Each request includes:  
    - **Article title**  
    - **Author’s name**  
    - **Submission date**  
    - **Status** (pending, approved, or rejected)  
- **Actions Available:**  
  - **Approve/Reject Subscription:**  
    - Admins and editors can either approve or reject user subscription requests.  
  - **Approve/Reject Article Requests:**  
    - Admins and editors can approve or reject articles based on their review.  
  - **Request Edits:**  
    - Option for admins and editors to request changes or edits to submitted articles.

### UI Overview:  
- **Subscription Requests:**  
  - A list or table showing each pending subscription request with options to approve or reject.  
- **Article Requests:**  
  - A list or table showing each article submitted for review, with options to approve, reject, or request edits.  
- **Request Statuses:**  
  - Clear indicators showing the status of each request (pending, approved, or rejected).

### Screenshots![aprové ou reject un subscription](https://github.com/user-attachments/assets/05b265bb-d478-41d7-97da-f54633c95cf1)
![management des themes](https://github.com/user-attachments/assets/97a0e6ec-b4eb-4bbb-91ef-df4aa111b8ed):  

## Public Access Features  
The web application offers **guests** (unauthenticated users) the ability to view **public articles**, **themes**, and **public issues**. This functionality allows users to explore content without needing to register or log in.

### Features:  
- **Public Articles:**  
  - Guests can view **approved public articles** that are made available by the authors.  
  - Articles include:  
    - **Title**  
    - **Excerpt** or short description  
    - **Author’s name**  
    - **Publication date**  
    - **Read More** button to view the full article  
- **Public Themes:**  
  - Guests can browse **publicly available themes**, which include:  
    - **Theme name**  
    - **Description**  
    - **Thumbnail** or image  
    - Option to **view details** of each theme  
- **Public Issues:**  
  - Guests can see **public issues** published by the magazine.  
  - Each issue includes:  
    - **Title**  
    - **Cover image**  
    - **Release date**  
    - **Short description** of the issue’s content  
  - **Link to view the articles** in the issue.


## 🛠️ Installation Guide
### Prerequisites
Ensure you have the following installed:
- **PHP 8.x**, **Composer**, **Laravel**
- **MySQL** (or another supported database)
- **Node.js & npm** (for frontend assets)

### 🚀 Setup Instructions
1. **Clone the repository**:
   ```sh
   git clone https://github.com/your-username/project-name.git
   cd project-name
   ```
2. **Install dependencies**:
   ```sh
   composer install
   npm install
   ```
3. **Configure environment variables**:
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```
4. **Set up the database**:
   ```sh
   php artisan migrate --seed
   ```
5. **Run the application**:
   ```sh
   php artisan serve
   npm run dev
   ```

## 🔥 Challenges Faced
- **Security in Role Management**: Ensuring only authorized users can access specific features.
- **Limited Timeframe**: Completing the project within a tight deadline.
- **Content Access Control**: Managing articles and themes dynamically based on user roles.

## 🚀 Future Enhancements
- **Automated Role Testing**: Improve security testing for access control.
- **Subscription Analytics**: Provide insights into user engagement.
- **API Support**: Allow third-party integrations.

## 📜 License
This project is licensed under the **MIT License**.

---

🚀 **Developed by [Your Name]**
