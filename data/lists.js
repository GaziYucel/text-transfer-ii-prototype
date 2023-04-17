/**
 * List of default messages for the app
 * @returns {{key, text}}
 */
function getDefaultMessages()
{
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
 * @returns [{key, type, schema, definition}]
 */
function getFields()
{
    return [
        { "key": "dc.body", "type": "richtext", "schema": "", "definition": "Main body of the resource" },
        { "key": "dc.contributor.author", "type": "object", "schema": "author", "definition": "The author of the resource." },
        { "key": "dc.date", "type": "date", "schema": "", "definition": "Use qualified form if possible." },
        { "key": "dc.description.abstract", "type": "richtext", "schema": "", "definition": "Abstract or summary." },
        { "key": "dc.identifier.doi", "type": "text", "schema": "", "definition": "Digital Object Identifier" },
        { "key": "dc.publisher", "type": "text", "schema": "", "definition": "Entity responsible for publication, distribution, or imprint." },
        { "key": "dc.references", "type": "multitext", "schema": "", "definition": "References " },
        { "key": "dc.rights", "type": "text", "schema": "", "definition": "Terms governing use and reproduction." },
        { "key": "dc.title", "type": "text", "schema": "", "definition": "Title of the resource" },
        { "key": "dc.subtitle", "type": "text", "schema": "", "definition": "Subtitle of the resource" },
    ];
}

/**
 * List of fields and their corresponding HTML tag in document according to Dublin Core
 * @returns [{key, tag}]
 */
function getFieldsHtml()
{
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
function getLanguages()
{
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
function getInstitutions()
{
    return [
        "Leibniz University Hannover",
        "Leibniz-Institut für Deutsche Sprache (IDS)",
        "Technische Informationsbibliothek (TIB)",
        "University of Mannheim"
    ];
}
