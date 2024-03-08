# Blog Website Readme

Welcome to our blog website! This PHP-based platform provides users with the ability to post and share their blogs with others. Below, you'll find essential information on how to navigate and use the features available on our website.

## Features

1. **Blog Posting**: Users can create and publish their own blogs. Each blog post can include text content as well as images.

2. **Image Uploading**: Users can upload images to accompany their blog posts. This feature enhances the visual appeal of the blogs.

3. **Basic Interactivity (Work in Progress)**: While the core functionality of posting blogs and uploading images is available, interactive features such as likes, comments, and sharing are currently under development.

## File Structure

- **blog_home.php**: This is the home page of our website where users can view all the published blog posts.
  
- **database.php**: This script handles the database connection for storing blog posts and related data.

- **search.php**: Users can search for specific blog posts using this page.

- **images/**: This directory stores all the uploaded images associated with blog posts.

- **php-pages/**: Contains PHP scripts for specific functionalities.
  - **could.php**: Handles database connection failure.
  - **image-validation.php**: Validates the format of uploaded images.

- **styles/**: Contains CSS files for styling the website.
  - **blog_home.css**: Styles specific to the home page.
  - **general.css**: General styles applicable across the website.

## Usage

1. **Viewing Blogs**:
   - Visit the home page (`blog_home.php`) to browse through all the available blog posts.
  
2. **Posting a Blog**:
   - Navigate to the `blog_home.php` page.
   - Enter the title and content of your blog post.
   - Upload images to accompany your post.
   - Click on the "Publish" button to make your blog post live on the website.

3. **Searching Blogs**:
   - Use the `search.php` page to search for specific blog posts based on keywords.

## Installation

1. **Requirements**:
   - PHP installed on your server.
   - A web server (e.g., Apache) to host the PHP files.
   - MySQL or another compatible database system.

2. **Setup**:
   - Clone or download the repository to your web server.
   - Ensure proper permissions are set for file uploads and directories.
   - Configure database connection settings in `database.php`.

## Contributing

We welcome contributions to improve our blog website! If you have ideas for new features, improvements, or bug fixes, feel free to submit a pull request or open an issue on our GitHub repository.


## Contact

If you have any questions, feedback, or concerns, please don't hesitate to reach out to us at [biruklemmadebela@gmail.com](mailto:biruklemmadebela@gmail.com). We'd love to hear from you!
