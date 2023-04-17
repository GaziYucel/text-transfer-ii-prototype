<?php require_once('header.php'); ?>

<div class="row">
    <div class="col">
        <input class="form-control" type="text" v-model="documentName"/>
    </div>
    <div class="col">
        <button class="btn btn-primary" v-on:click="notReady">Save</button>
    </div>
    <div class="col-12">
        <hr/>
    </div>
</div>

<div class="row">

    <div class="col-form col-6">

        <span class="form-label">FORM</span>
        <hr/>

        <div class="row">
            <div class="col">
                <select class="form-select">
                    <option value="" disabled selected hidden>Choose field</option>
                    <option v-for="(value, key, index) in fields" :value="key" :key="index">
                        {{ value }} ({{ key }})
                    </option>
                </select>
            </div>
            <div class="col">
                <button class="btn btn-outline-secondary" v-on:click="notReady">Add new field</button>
            </div>
            <div class="col-12"><br/></div>
        </div>

    </div>

    <div class="col-preview col-6">
        <span class="form-label">PREVIEW</span>
        <hr/>
        <div id="preview" v-html="preview"></div>
    </div>

</div>

<?php require_once('footer.php'); ?>

<script>
    const {createApp} = Vue;

    let vueApp = createApp({
        data() {
            return {
                documentName: 'New document name goes here',
                messages: getMessages(),
                document: {},
                fields: getFields(),
                title: getTitle(),
                sub_title: getSubTitle(),
                keywords: getKeywords(),
                authors: getAuthors(),
                abstract: getAbstract(),
                identifier: getIdentifiers(),
                body: getBody(),
                authorSchema: getAuthorSchema(),
                institutions: getInstitutions()
            }
        },
        methods: {
            notReady() {
                alert(this.messages.notReady);
            },
            addAuthor() {
                this.authors.push(JSON.parse(JSON.stringify(this.authorSchema)));
            },
            removeAuthor: function (index) {
                if (confirm(this.messages.confirmDelete) !== true) {
                    return;
                }
                this.authors.splice(index, 1);
            }
        },
        computed: {
            preview() {
                return '';
            }
        }
    });

    vueApp.mount('#app');

</script>
