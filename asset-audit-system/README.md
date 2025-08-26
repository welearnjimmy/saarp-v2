# Asset Audit System

## Overview
The Asset Audit System is a comprehensive web application designed for managing assets, conducting audits, and generating automated reports. The system focuses on accuracy, transparency, and efficiency, providing users with the tools they need to effectively manage asset data.

## Features
- **User Authentication**: Signup and signin functionality with role-based access control.
- **Asset Management**: View, add, edit, and delete asset records.
- **Audit Management**: Conduct audits and view audit records.
- **Asset Movements**: Track and log asset transfers.
- **Location Management**: Manage and update asset storage locations.
- **Discrepancy Handling**: Display and resolve discrepancies found during audits.
- **Reporting**: Generate and display various reports related to assets and audits.
- **Photo Management**: Upload and view geo-tagged photos related to audits.
- **Real-time Data Capture**: Use barcode scanning, GPS, and photo evidence for accurate data collection.
- **Audit Trails**: Immutable logs of every entry/change with user ID, timestamp, and device ID.
- **Offline Functionality**: Collect data in remote areas and sync once internet is available.

## Project Structure
```
asset-audit-system
├── public
│   ├── index.php
│   ├── signup.php
│   ├── signin.php
│   ├── dashboard.php
│   ├── assets.php
│   ├── audits.php
│   ├── movements.php
│   ├── locations.php
│   ├── discrepancies.php
│   ├── reports.php
│   ├── photos.php
│   ├── css
│   │   └── style.css
│   ├── js
│   │   ├── main.js
│   │   └── barcode-scanner.js
│   └── images
├── src
│   ├── controllers
│   │   ├── AuthController.php
│   │   ├── AssetController.php
│   │   ├── AuditController.php
│   │   ├── MovementController.php
│   │   ├── LocationController.php
│   │   ├── DiscrepancyController.php
│   │   ├── ReportController.php
│   │   └── PhotoController.php
│   ├── models
│   │   ├── User.php
│   │   ├── Asset.php
│   │   ├── Audit.php
│   │   ├── Movement.php
│   │   ├── Location.php
│   │   ├── Discrepancy.php
│   │   └── Report.php
│   ├── middleware
│   │   └── RoleMiddleware.php
│   ├── utils
│   │   ├── BarcodeUtil.php
│   │   ├── GPSUtil.php
│   │   ├── PhotoUtil.php
│   │   └── PDFExcelUtil.php
│   └── database
│       ├── migrations
│       │   └── create_tables.sql
│       └── seeders
│           └── seed_data.sql
├── config
│   └── config.php
├── logs
│   └── audit.log
├── .env
├── composer.json
└── README.md
```

## Installation
1. Clone the repository:
   ```
   git clone https://github.com/microsoft/vscode-remote-try-php.git
   ```
2. Navigate to the project directory:
   ```
   cd asset-audit-system
   ```
3. Install dependencies using Composer:
   ```
   composer install
   ```
4. Set up the database by running the SQL migration files located in `src/database/migrations/create_tables.sql`.
5. Configure environment variables in the `.env` file.
6. Start the server and access the application via your web browser.

## Usage
- Access the application through the `public/index.php` file.
- Users can sign up and log in to access their respective dashboards based on their roles.
- Field agents can capture asset data using barcode scanners and GPS.
- Admins can manage user roles and view audit trails.

## Contributing
Contributions are welcome! Please submit a pull request or open an issue for any enhancements or bug fixes.

## License
This project is licensed under the MIT License. See the LICENSE file for details.