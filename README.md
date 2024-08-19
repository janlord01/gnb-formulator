# Raw Materials & Formula Management System

## Overview

This application is designed to help manufacturers in the cosmetics or food industry manage their raw materials and create precise formulas. Users can input and manage raw materials, define formulas for their products, and generate accurate batch recipes. The application ensures that the correct amounts of each ingredient are calculated based on the desired batch size, which can then be printed for use in production.

## Features

- **Raw Materials Management:**
  - Add, edit, and delete raw materials.
  - Track quantities and costs of raw materials.
  - Organize materials by category (e.g., emulsifiers, preservatives, flavors).

- **Formula Creation:**
  - Define formulas by selecting raw materials and specifying their percentages.
  - Automatically calculate the required amounts of each material based on the batch size.
  - Save and manage multiple formulas.

- **Batch Calculation:**
  - Input the desired batch size to generate precise ingredient measurements.
  - Option to adjust batch sizes and recalculate amounts on the fly.

- **Printing:**
  - Generate and print detailed batch recipes with accurate ingredient quantities.
  - Print formulas for record-keeping or production use.

## Getting Started

### Prerequisites

- **Node.js**
- **Laravel**
- **MySQL** or any other preferred database

### Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/yourusername/raw-materials-management.git
    cd raw-materials-management
    ```

2. **Install dependencies:**

    - **Frontend (Quasar Vue.js):**

      ```bash
      cd frontend
      npm install
      ```

    - **Backend (Laravel):**

      ```bash
      cd backend
      composer install
      ```

3. **Set up environment variables:**

    - Create a `.env` file in the `backend` directory by copying the `.env.example`:

      ```bash
      cp .env.example .env
      ```

    - Update the database credentials and other necessary environment variables in the `.env` file.

4. **Migrate the database:**

    ```bash
    php artisan migrate
    ```

5. **Start the application:**

    - **Frontend:**

      ```bash
      quasar dev
      ```

    - **Backend:**

      ```bash
      php artisan serve
      ```

## Usage

1. **Log in to the system and navigate to the dashboard.**
2. **Add raw materials under the "Materials" section.**
3. **Create new formulas by selecting raw materials and setting their percentages.**
4. **Input the desired batch size to see the calculated amounts of each ingredient.**
5. **Print the formula for use in production.**

## Contributing

Contributions are welcome! Please feel free to submit a pull request or open an issue to suggest improvements or report bugs.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact

For any inquiries, please reach out to [janlord.luga@gmail.com](mailto:janlord.luga@gmail.com).
