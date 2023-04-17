/**
 * Download blob as a file
 * Extension is generated depending on blob type
 * e.g. 'application/pdf' > .pdf
 * @param blob
 */
function downloadBlobAsFile(blob){
    let url = window.URL || window.webkitURL;
    let link = url.createObjectURL(blob);
    let a = document.createElement("a");
    a.setAttribute("href", link);
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}

/**
 * Converts text to safe xml syntax and returns this
 * @param text
 * @returns {string}
 */
function convertToSafeXmlText(text){
    let table= {
        '<': 'lt',
        '>': 'gt',
        '"': 'quot',
        '\'': 'apos',
        '&': 'amp',
        '\r': '#10',
        '\n': '#13'
    };

    return text.toString().replace(
        /[<>"'\r\n&]/g,
        function(chr){
            return '&' + table[chr] + ';';
    });
}
