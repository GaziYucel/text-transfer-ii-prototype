/**
 * Author schema
 * @returns {{
 * given_name: {type: string, unique: boolean, label: string, enum: *[]},
 * family_name: {type: string, unique: boolean, label: string, enum: *[]},
 * email: {type: string, unique: boolean, label: string, enum: *[]},
 * institution: {type: string, unique: boolean, label: string, enum: *[]} }}
 */
function getAuthorSchema()
{
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
function getFieldSchema()
{
    return {
        "key": {"type": "string", "unique": true, "label": "Key", "enum": []},
        "type": {"type": "string", "unique": false, "label": "Type", "enum": ["text", "object"]},
        "schema": {"type": "string", "unique": false, "label": "Schema", "enum": ["object"]},
        "required": {"type": "bool", "unique": false, "label": "Required", "enum": []},
        "definition": {"type": "string", "unique": false, "label": "Definition", "enum": []}
    };
}

function getDocumentSchema()
{
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
function getDocumentFieldSchema()
{
    return {
        "key": "",
        "type": "",
        "schema": "",
        "definition": "",
        "value": ""
    };
}
