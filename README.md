**Pope Athanasius Library**  
A comprehensive library management system built with Laravel Livewire and Tailwind CSS. This system streamlines the process of managing books, authors, and publishers with advanced features, including:

- **Book Management**: Add, edit, and manage book details (author, publisher, shelf location, category, topics, summary, cover image, and PDF).
- **User Roles and Permissions**: Granular control over user access and actions.
- **Advanced Search**: Efficient book searching with multiple filters.
- **Excel Integration**: Import and export books using Excel files for bulk management.
- **Server Synchronization**: Synchronize book data between two servers seamlessly.
- **Daily Verse Display**: Display a unique daily verse for a personalized experience.
- **Admin Tools**: Manage posts, users, and overall library content easily.
- ### Installation

1.  **Clone the repository:**

```bash
  git clone https://github.com/Thomas-Emad/pope-athanasius-library.git
  cd pope-athanasius-library
```

2.  **Install dependencies:**

```bash
  composer install
  npm install && npm run dev
```

2.  **Set up environment variables:**  
    Create a `.env` file and update the following keys for server synchronization:

```.env
  API_EXTERNAL_APP_SYNC="Your External Server Domain"
  API_INTERNAL_APP_SYNC="Your Internal Server Domain"
  API_EXTERNAL_APP_SYNC_PASSWORD="password in two servers"
```

3.  **Generate the application key:**

```bash
  php artisan key:generate
```

4.  **Run migrations:**

```bash
  php artisan migrate --seed
```

5.  **Start the application:**

```bash
  php artisan serve
```

### Notes

- Ensure both internal and external servers are running for synchronization features to work.
- Make sure the synchronization password matches between the servers.

This project demonstrates clean architecture and a focus on usability, making it a perfect tool for libraries to digitize and manage their collections effectively.
