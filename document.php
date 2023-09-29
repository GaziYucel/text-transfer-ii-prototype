<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Text Transfer II</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>

    <!--<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">-->
    <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap.min.css">

    <!--<script src="//unpkg.com/vue@3/dist/vue.global.prod.js"></script>-->
    <script type="text/javascript" src="assets/lib/vue.global.prod.js"></script>

    <!--<script src="//github.com/foliojs/pdfkit/releases/download/v0.12.0/pdfkit.standalone.js"></script>-->
    <script type="text/javascript" src="assets/lib/pdfkit.standalone.js"></script>

    <!--<script src="//github.com/devongovett/blob-stream/releases/download/v0.1.3/blob-stream.js"></script>-->
    <script type="text/javascript" src="assets/lib/blob-stream.js"></script>

    <script type="text/javascript" src="assets/js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

<header class="row">
    <div class="col-12">
        <p><a href="index.php"><img class="logo" src="assets/img/logo-small.png" alt="TextTransfer Logo"/></a></p>
        <hr/>
    </div>
</header>

<main class="row">
    <div class="col-12">
        <div id="app">

            <div class="row">
                <div class="col">
                    <input class="form-control" type="text"
                           v-model="authenticationToken" id="authenticationToken" name="authenticationToken"
                           placeholder="Token for saving"/>
                </div>
                <div class="col">
                    <button class="btn btn-primary" v-on:click="saveToFile()"
                            :disabled="(isAuthenticationTokenConfigured || !authenticationToken)">Save to server
                    </button> &nbsp;
                    <button class="btn btn-primary" v-on:click="saveToGitHub()"
                            :disabled="(isGitHubTokenConfigured || !authenticationToken)">Save to GitHub Issue
                    </button>
                </div>
                <div class="col-12">
                    <hr/>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="column-form">
                        <div class="row d-grid gap-1">
                            <!-- metadata -->
                            <div class="form-group row " v-for="(value, key, index) in currentDocument.metadata"
                                 :key="key">
                                <div class="col-3">
                                    <label :for="key" class="form-label text-capitalize">{{ key }}</label>
                                </div>
                                <div class="col-9">
                                    <input v-model="currentDocument.metadata[key]" type="text"
                                           :disabled="!newDocument"
                                           :id="key" :name="key" :placeholder="key" class="form-control"/>
                                </div>
                            </div>
                            <!-- metadata -->
                            <!-- fields -->
                            <div class="form-group row" v-for="(item, index) in currentDocument.fields" :key="index">
                                <label :for="item.key+'.'+index" class="form-label">{{ index }}. {{ item.definition }}
                                    ({{ item.key }})</label>
                                <textarea v-if="item.type==='richtext'" v-model="item.value" type="text"
                                          :id="item.key+'.'+index" :name="item.key+'.'+index"
                                          :placeholder="item.definition"
                                          class="form-control"></textarea>
                                <textarea v-else-if="item.type==='multitext'" v-model="item.value" type="text"
                                          :id="item.key+'.'+index" :name="item.key+'.'+index"
                                          :placeholder="item.definition"
                                          class="form-control"></textarea>
                                <input v-else-if="item.type==='date'" v-model="item.value" type="date"
                                       :id="item.key+'.'+index" :name="item.key+'.'+index"
                                       :placeholder="item.definition"
                                       class="form-control"/>
                                <input v-else-if="item.type==='text'" v-model="item.value" type="text"
                                       :id="item.key+'.'+index" :name="item.key+'.'+index"
                                       :placeholder="item.definition"
                                       class="form-control"/>
                                <select v-else-if="item.type='select'" class="form-select" v-model="item.value">
                                    <option value="" disabled selected hidden>Choose field</option>
                                    <option v-for="(license) in licenses" :value="license" :key="license">{{ license
                                        }}
                                    </option>
                                </select>
                                <textarea v-else v-model="item.value" type="text"
                                          :id="item.key+'.'+index" :name="item.key+'.'+index"
                                          :placeholder="item.definition"
                                          class="form-control"></textarea>

                            </div>
                            <!-- fields -->
                            <!-- add field -->
                            <div class="form-group row">
                                <div class="col-9">
                                    <select class="form-select" v-model="selectedFieldIndex">
                                        <option value="" disabled selected hidden>Choose field</option>
                                        <option v-for="(field, index) in fields" :value="index" :key="index">
                                            {{ index }} - {{ field.key }} - {{ field.definition }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-3 text-end">
                                    <button class="btn btn-secondary" v-on:click="addField">Add field</button>
                                </div>
                            </div>
                            <!-- add field -->

                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="column-preview">
                        <div>
                            <button class="btn btn-outline-secondary" :class="{ active: showPreview.raw}"
                                    v-on:click="switchPreview('raw')">Raw
                            </button> &nbsp;
                            <button class="btn btn-outline-secondary" :class="{ active: showPreview.html}"
                                    v-on:click="switchPreview('html')">Html
                            </button> &nbsp;
                            <button class="btn btn-outline-secondary" :class="{ active: showPreview.pdf}"
                                    v-on:click="switchPreview('pdf')">Pdf
                            </button> &nbsp;
                            <button class="btn btn-outline-secondary" :class="{ active: showPreview.dspace}"
                                    v-on:click="switchPreview('dspace')">DSpace
                            </button>
                        </div>
                        <hr/>
                        <div id="showPreview.raw" v-show="showPreview.raw">
                            <pre>{{ previewRaw }}</pre>
                        </div>
                        <div id="showPreview.html" v-show="showPreview.html">
                            <label for="showPreviewHtmlTextArea">RAW HTML</label>
                            <textarea id="showPreviewHtmlTextArea" disabled="disabled" v-model="previewHtml"></textarea>
                            <br/><br/>
                            <p>PREVIEW</p>
                            <div class="preview-border">
                                <div v-html="previewHtml"></div>
                            </div>
                        </div>
                        <div id="showPreview.pdf" v-show="showPreview.pdf">
                            <button class="btn btn-outline-primary" v-on:click="createPdf">Download Pdf</button>
                        </div>
                        <div id="showPreview.dspace" v-show="showPreview.dspace">
                            <pre>{{ previewDspace }}</pre>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</main>

<script>
    const {createApp} = Vue;
    const app = createApp({
        data() {
            return {
                apiUrl: 'api.php',
                authenticationToken: '',
                defaultMessages: getDefaultMessages(),
                fields: getFields(),
                fieldsHtml: getFieldsHtml(),
                institutions: getInstitutions(),
                licenses: getLicenses(),
                authorSchema: getAuthorSchema(),
                documentFieldSchema: getDocumentFieldSchema(),
                newDocument: true,
                currentDocument: getDocumentSchema(),
                savedDocument: <?= (!empty($_GET[DOCUMENT_URL_KEY]) && file_exists(DOCUMENTS_DIR . '/' . $_GET[DOCUMENT_URL_KEY])) ? file_get_contents(DOCUMENTS_DIR . '/' . $_GET[DOCUMENT_URL_KEY]) : '{}'; ?>,
                selectedFieldIndex: '',
                showPreview: {"raw": true, "html": false, "pdf": false, "dspace": false},
                githubUrlIssues: '<?=GITHUB_URL_ISSUES?>',
                isAuthenticationTokenConfigured: <?= (!empty(AUTHENTICATION_TOKEN)) ? 'false' : 'true'; ?>,
                isGitHubTokenConfigured: <?= (!empty(AUTHENTICATION_TOKEN) && !empty(GITHUB_TOKEN)) ? 'false' : 'true'; ?>,
            }
        },
        methods: {
            alertMessage(message) {
                if (typeof (message) === 'string') {
                    alert(this.defaultMessages[message]);
                    return true;
                }
                alert(this.defaultMessages['notImplemented']);
            },
            addField() {
                let documentField = {};
                Object.keys(this.documentFieldSchema).forEach(key => {
                    if (key !== 'value') {
                        documentField[key] = this.fields[this.selectedFieldIndex][key];
                    }
                });
                documentField['value'] = '';
                this.currentDocument.fields.push(documentField);
            },
            saveToFile() {
                if (confirm(this.defaultMessages.confirmSave)) {
                    fetch(this.apiUrl + '?action=saveToFile', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            '<?=TOKEN_KEY?>': this.authenticationToken
                        },
                        body: JSON.stringify(this.currentDocument)
                    }).then(response => {
                        if (response.status === 200) {
                            this.newDocument = false;
                        }
                    });
                }
            },
            saveToGitHub() {
                if (confirm(this.defaultMessages.confirmSave)) {
                    fetch(this.apiUrl + '?action=saveToGitHub', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            '<?=TOKEN_KEY?>': this.authenticationToken
                        },
                        body: JSON.stringify(this.currentDocument)
                    }).then(response => {
                        return response.json();
                    }).then(data => {
                        this.currentDocument.metadata['github'] =
                            this.githubUrlIssues + data['issueId'];
                    });
                }
            },
            switchPreview(current) {
                this.showPreview = {"raw": false, "html": false, "pdf": false, "dspace": false};
                this.showPreview[current] = true;
            },
            createPdf() {
                const doc = new PDFDocument;
                const stream = doc.pipe(blobStream());

                this.currentDocument.fields.forEach(row => {
                    let value = row['value'];
                    value = value.replace('<br>', "\n").replace('<br/>', "\n");
                    value = value.replace(/<\/?strong[^>]*>/g, ""); // remove <p></p>
                    value = value.replace(/<\/?p[^>]*>/g, ""); // remove <p></p>
                    doc.fontSize(14).text(value).moveDown();
                });
                doc.end();

                stream.on('finish', function () {
                    downloadBlobAsFile(stream.toBlob('application/pdf'));
                });
            }
        },
        computed: {
            previewRaw() {
                return JSON.stringify(this.currentDocument, null, 4);
            },
            previewHtml() {
                let preview = '';
                this.currentDocument.fields.forEach(row => {
                    let value = row['value'].replace(/[\r\n]{2}/g, "<br/><br/>\n");
                    if (this.fieldsHtml[row['key']] !== '') {
                        preview +=
                            '<' + this.fieldsHtml[row['key']] + '>' +
                            value +
                            '</' + this.fieldsHtml[row['key']] + '>';
                    } else {
                        preview +=
                            '<p>' + value + '</p>';
                    }

                    preview += '\n';
                });

                return preview;
            },
            previewDspace() {
                let preview = '';
                preview += '<' + '?xml version="1.0" encoding="UTF-8"?>' + '\n';
                preview += '  <dublin_core>' + '\n';
                this.currentDocument.fields.forEach(row => {
                    let parts = row['key'].split('.');
                    let element = parts[1];
                    let qualifier = '';
                    if (parts.length >= 3) {
                        qualifier = parts[2];
                    }

                    let value = convertToSafeXmlText(row['value']);

                    preview += '    <dcvalue ' +
                        'element="' + element + '" ' +
                        'qualifier="' + qualifier + '"' +
                        '>' + value + '</dcvalue>';

                    preview += '\n';
                });

                preview += '  </dublin_core>' + '\n';
                preview += '</xml>' + '\n';
                return preview;
            }
        },
        created() {
            let savedDocument = this.savedDocument;
            if (Object.keys(savedDocument).length > 0) {
                this.currentDocument = savedDocument;
                this.newDocument = false;
            }
        }
    });
    app.mount('#app');
    app.config.errorHandler = (err, instance, info) => {
        console.log('VueJS-errorHandler err: ' + err.toString());
        console.log('VueJS-errorHandler instance: ' + instance);
        console.log('VueJS-errorHandler info: ' + info.toString());
    };

    /* lists */

    /**
     * List of default messages for the app
     *
     * @returns {{key, text}}
     */
    function getDefaultMessages() {
        return {
            "notImplemented": "This feature is not implemented yet.",
            "confirmSave": "Are you sure you want to save?",
            "confirmCancel": "Are you sure you want to cancel?",
            "confirmDelete": "Are you sure you want to delete?",
            "confirmInsert": "Are you sure you want to insert?"
        }
    }

    /**
     * List of fields in document according to Dublin Core
     *
     * @returns {key: string, type: string, schema: string, definition: string}
     */
    function getFields() {
        return [
            {"key": "dc.body", "type": "richtext", "schema": "", "definition": "Main body of the resource"},
            {
                "key": "dc.contributor.author",
                "type": "object",
                "schema": "author",
                "definition": "The author of the resource."
            },
            {"key": "dc.date", "type": "date", "schema": "", "definition": "Use qualified form if possible."},
            {"key": "dc.description.abstract", "type": "richtext", "schema": "", "definition": "Abstract or summary."},
            {"key": "dc.identifier.doi", "type": "text", "schema": "", "definition": "Digital Object Identifier"},
            {"key": "dc.publisher", "type": "text", "schema": "", "definition": "Publisher of resource."},
            {"key": "dc.references", "type": "multitext", "schema": "", "definition": "References "},
            {
                "key": "dc.rights",
                "type": "select",
                "schema": "license",
                "definition": "Terms governing use and reproduction."
            },
            {"key": "dc.title", "type": "text", "schema": "", "definition": "Title of the resource"},
            {"key": "dc.subtitle", "type": "text", "schema": "", "definition": "Subtitle of the resource"},
        ];
    }

    /**
     * List of fields and their corresponding HTML tag in document according to Dublin Core
     *
     * @returns {{key, tag}}
     */
    function getFieldsHtml() {
        return {
            "dc.body": "",
            "dc.contributor.author": "",
            "dc.date": "",
            "dc.description.abstract": "",
            "dc.identifier.doi": "",
            "dc.publisher": "",
            "dc.references": "",
            "dc.rights": "",
            "dc.title": "h1",
            "dc.subtitle": "h2"
        };
    }

    /**
     * List of ISO 639-1 codes
     * @returns {{key, label}}
     */
    function getLanguages() {
        return {
            "nl ": "Dutch",
            "en ": "English",
            "de": "German"
        };
    }

    /**
     * List of German institutions (source GWDG)
     * @returns {{key, label}}
     */
    function getInstitutions() {
        return [
            "Leibniz University Hannover",
            "Leibniz-Institut für Deutsche Sprache (IDS)",
            "Technische Informationsbibliothek (TIB)",
            "University of Mannheim"
        ];
    }

    /**
     * License types
     * @returns {*}
     */
    function getLicenses() {
        return [
            "None",
            "GNU General Public License",
            "Creative Commons",
            "MIT License"
        ];
    }

    /* schemas */

    /**
     * Author schema
     * @returns {{
     * given_name: {type: string, unique: boolean, label: string, enum: *[]},
     * family_name: {type: string, unique: boolean, label: string, enum: *[]},
     * email: {type: string, unique: boolean, label: string, enum: *[]},
     * institution: {type: string, unique: boolean, label: string, enum: *[]} }}
     */
    function getAuthorSchema() {
        return {
            "given_name": {"type": "string", "unique": false, "label": "Given name", "enum": []},
            "family_name": {"type": "string", "unique": false, "label": "Family name", "enum": []},
            "email": {"type": "string", "unique": true, "label": "Email", "enum": []},
            "institution": {"type": "object", "unique": false, "label": "Institution", "enum": []}
        };
    }

    /**
     * Field schema
     * @returns {{
     * key: {unique: boolean, label: string, type: string, enum: *[]},
     * type: {unique: boolean, label: string, type: string, enum: string[]},
     * schema: {unique: boolean, label: string, type: string, enum: string[]},
     * required: {unique: boolean, label: string, type: string, enum: *[]},
     * definition: {unique: boolean, label: string, type: string, enum: *[]} }}
     */
    function getFieldSchema() {
        return {
            "key": {"type": "string", "unique": true, "label": "Key", "enum": []},
            "type": {"type": "string", "unique": false, "label": "Type", "enum": ["text", "object"]},
            "schema": {"type": "string", "unique": false, "label": "Schema", "enum": ["object"]},
            "required": {"type": "bool", "unique": false, "label": "Required", "enum": []},
            "definition": {"type": "string", "unique": false, "label": "Definition", "enum": []}
        };
    }

    /**
     * Document schema
     * @returns {{metadata: {github: string, created: string, name: string, modified: string}, fields: *[]}}
     */
    function getDocumentSchema() {
        return {
            "metadata": {
                "name": "",
                "created": "",
                "modified": "",
                "github": ""
            },
            "fields": []
        }
    }

    /**
     * Document item schema
     * @returns {{schema: string, definition: string, type: string, value: string, key: string}}
     */
    function getDocumentFieldSchema() {
        return {
            "key": "",
            "type": "",
            "schema": "",
            "definition": "",
            "value": ""
        };
    }

</script>

<footer class="row">
    <div class="col-12">
        <hr/>
        <a href="https://texttransfer.org/contact.html" target="_blank">Contact</a> |
        <a href="https://texttransfer.org/en/privacy-policy.html" target="_blank">Privacy Policy</a> |
        <a href="https://texttransfer.org/en/legal-notice.html" target="_blank">Legal Notice</a> |
        <a href="https://github.com/TIBHannover/text-transfer-ii-prototype" target="_blank">Code (GitHub)</a>
    </div>
</footer>

</body>
</html>
