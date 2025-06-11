# Simple Data Management System

A flexible, responsive web-based data management system with a beautiful modern interface. Built with vanilla JavaScript and PHP, it allows you to store, edit, search, and manage data records in JSON format.

## Features

- **Dynamic Form Generation** - Easily customizable fields through configuration
- **Real-time Search** - Filter records instantly as you type
- **Inline Editing** - Click any record to edit it directly
- **Responsive Design** - Works perfectly on desktop and mobile devices
- **JSON Storage** - Simple file-based storage with PHP backend
- **Modern UI** - Beautiful gradient design with smooth animations
- **Version Tracking** - Built-in data migration support

## Quick Start

### Prerequisites
- Web server with PHP support (Apache, Nginx, or local development server)
- PHP 7.0 or higher

### Installation

1. Clone or download the repository
2. Place all files in your web server directory
3. Ensure the web server has write permissions for the directory (for JSON file creation)
4. Access `index.html` through your web browser

### File Structure
```
project/
├── index.html          # Main application file
├── save-data.php       # Handles new record creation
├── load-data.php       # Loads existing records
├── update-data.php     # Updates existing records
├── delete-data.php     # Deletes records
└── serverData.json     # Data storage (created automatically)
```

## How It Works

### Data Storage
- Records are stored in `serverData.json` as an array of objects
- Each record includes metadata (timestamp, version, unique ID)
- PHP backend handles all CRUD operations
- Data is automatically migrated when form fields change

### Form System
The application uses a dynamic form generation system controlled by the `formFields` array in `index.html`. Each field configuration includes:

```javascript
{
    name: 'fieldName',           // Unique identifier
    type: 'text',               // Input type (text, textarea, etc.)
    label: 'Display Label',     // User-visible label
    required: true,             // Whether field is mandatory
    placeholder: 'Hint text',   // Placeholder text
    grid: true                  // Whether to show in grid layout
}
```

## Customization

### Changing Application Labels

Edit the `APP_CONFIG` object in `index.html`:

```javascript
const APP_CONFIG = {
    mainTitle: 'Your Custom Title',
    formTitle: 'Add New Item',
    recordsTitle: 'Your Records',
    // ... other labels
};
```

### Adding New Fields

Add field configurations to the `formFields` array:

```javascript
const formFields = [
    // Existing fields...
    {
        name: 'newField',
        type: 'text',
        label: 'New Field Label',
        required: false,
        placeholder: 'Enter value...',
        grid: true
    }
];
```

**Supported field types:**
- `text` - Single line text input
- `textarea` - Multi-line text input
- `email` - Email input with validation
- `number` - Numeric input
- `date` - Date picker
- `url` - URL input with validation

### Removing Fields

Simply delete the field configuration from the `formFields` array. Existing records will automatically migrate to hide the removed field.

### Grid Layout Control

- Set `grid: true` for fields that should appear in the multi-column grid
- Set `grid: false` for full-width fields (like descriptions)
- The grid automatically adjusts based on screen size

### Styling Customization

The CSS uses custom properties and can be easily modified:

- **Colors**: Edit the gradient values in the `body` and `.submit-btn` styles
- **Layout**: Modify the grid template in `.form-grid` and `.servers-grid`
- **Animations**: Adjust transition durations and transform values
- **Responsive**: Breakpoints are defined in the media queries

## API Endpoints

### Save New Record
- **URL**: `save-data.php`
- **Method**: POST
- **Body**: JSON object with form data

### Load All Records
- **URL**: `load-data.php`
- **Method**: GET
- **Response**: JSON array of all records

### Update Record
- **URL**: `update-data.php`
- **Method**: POST
- **Body**: JSON object with form data + index

### Delete Record
- **URL**: `delete-data.php`
- **Method**: POST
- **Body**: JSON object with index to delete

## Usage Guide

### Adding Records
1. Fill out the form with required information
2. Click "Add Entry" to save
3. Record appears immediately in the grid below

### Editing Records
1. Click on any record card
2. Form populates with existing data
3. Modify fields as needed
4. Click "Update Entry" to save changes

### Searching Records
1. Use the search box in the top right
2. Search works across all fields
3. Results filter in real-time

### Deleting Records
1. Click the × button on any record card
2. Confirm deletion in the popup
3. Record is permanently removed

## Configuration Examples

### Simple Contact Manager
```javascript
const formFields = [
    {
        name: 'fullName',
        type: 'text',
        label: 'Full Name',
        required: true,
        placeholder: 'Enter full name',
        grid: true
    },
    {
        name: 'email',
        type: 'email',
        label: 'Email Address',
        required: true,
        placeholder: 'user@example.com',
        grid: true
    },
    {
        name: 'phone',
        type: 'text',
        label: 'Phone Number',
        required: false,
        placeholder: '+1 (555) 123-4567',
        grid: true
    },
    {
        name: 'notes',
        type: 'textarea',
        label: 'Notes',
        required: false,
        placeholder: 'Additional information...',
        grid: false
    }
];
```

### Inventory Management
```javascript
const formFields = [
    {
        name: 'itemName',
        type: 'text',
        label: 'Item Name',
        required: true,
        placeholder: 'Product name',
        grid: true
    },
    {
        name: 'sku',
        type: 'text',
        label: 'SKU',
        required: true,
        placeholder: 'Product SKU',
        grid: true
    },
    {
        name: 'quantity',
        type: 'number',
        label: 'Quantity',
        required: true,
        placeholder: '0',
        grid: true
    },
    {
        name: 'price',
        type: 'number',
        label: 'Price',
        required: false,
        placeholder: '0.00',
        grid: true
    }
];
```

## Development

### Local Development
Use PHP's built-in server for quick testing:
```bash
php -S localhost:8000
```
Make sure the `apiBasePath` in your `APP_CONFIG` matches the address and port you are using for development.  
For example, if you're running the server as shown above, set:

```json
apiBasePath: "http://localhost:8000/"
```

### Adding Features
The codebase is structured for easy extension:
- Form generation is handled by `generateForm()` and `generateFieldHTML()`
- Data operations are centralized in the CRUD functions
- UI updates are managed through `displayServers()` and related functions

### Data Migration
The system automatically handles field changes:
- New fields are added with empty values to existing records
- Removed fields are hidden but preserved in data
- Version tracking helps manage future migrations

## Browser Support

- Chrome/Edge 70+
- Firefox 65+
- Safari 12+
- Mobile browsers (iOS Safari, Chrome Mobile)

## Security Notes

- This system is designed for local/internal use
- No authentication is built-in
- File permissions should be properly configured
- Consider adding input validation for production use

## Troubleshooting

### Common Issues

**Records not saving:**
- Check PHP error logs
- Verify write permissions on the directory
- Ensure PHP is properly configured

**Search not working:**
- Check browser console for JavaScript errors
- Verify all form fields are properly defined

**Styling issues:**
- Clear browser cache
- Check for CSS conflicts
- Verify all required files are loaded

### File Permissions
Ensure the web server can write to the application directory:
```bash
chmod 755 /path/to/your/app
chmod 644 index.html *.php
```

## License

This project is open source and available under the MIT License.