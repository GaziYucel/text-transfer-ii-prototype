# TextTransfer II Prototype

## Summary

This is a simple demo to show what is possible. This is a work in process, much needs to be done yet.

Currently the following features are working: 
* List documents saved to the file system
* Create new document and define the fields
* Save to file system
* Save the raw json to GitHub Issues
* Preview Raw json output
* Preview Html output
* Generate a simple Pdf file
* Generate DSpace compatible output

## Structure

    .
    ├─ .github                         # GitHub Actions
    ├─ .project                        # Project related files
    ├─ assets                          # Static assets
    │   ├─ css                         # Styles
    │   │   └─ style.css               # Main style sheet
    │   ├─ fonts                       # Fonts used by the app
    │   │─ img                         # Images
    │   ├─ js                          # Javascript files
    │   │   └─ script.js               # Main javascript file
    │   └─ lib                         # External scripts used by the app
    │       │─ blob-stream.js          # Source: https://github.com/devongovett/blob-stream
    │       │─ bootstrap.min.css       # Source: https://getbootstrap.com
    │       │─ pdfkit.standalone.js    # Source: https://github.com/foliojs/pdfkit
    │       └─ vue.global.prod.js      # Source: https://vuejs.org
    ├─ documents                       # Directory where documents are saved
    ├─ vendor                          # Composer created directory for dependencies
    ├─ .gitignore                      # List of files ignored by git
    ├─ api.php                         # Api used by the app
    ├─ composer.json                   # Composer file for installing dependencies
    ├─ config.php                      # Configuration parameters    
    ├─ config.secrets.php              # This file contains the token for saving and github (auto created by config.php)
    ├─ document.php                    # Document edit logic
    ├─ index.php                       # List of saved documents
    ├─ LICENSE                         # License file
    └─ README.md                       # This file

## Setup

* Tested with PHP 8.0/8.1
* Download zip file and copy to the webserver
* After first run, config.secrets.php is created.
  - Fill in AUTHENTICATION_TOKEN: this is for saving files to the file system
  - Fill in GITHUB_TOKEN: this is for saving issues to GitHub

## Authorisation

There is a simple authorisation built in.
The authorisation is a simple check for a token.
The tokens can be found in the file "config.secrets.php".

## Demo

You can find a working demo at this address: https://labs.someserver.eu/text-transfer-ii-prototype/

For security reasons, saving is disabled. 
