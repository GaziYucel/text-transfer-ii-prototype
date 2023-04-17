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
            <div class="form-group">
                <label for="title" class="form-label">Title (dc:title)</label>
                <textarea v-model="title" type="text" id="title" name="title" placeholder="Title"
                          class="form-control"></textarea>
                <div class="col-12"><br/></div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label for="sub_title" class="form-label">Sub title (dc:subtitle)</label>
                <textarea v-model="sub_title" type="text" id="sub_title" name="sub_title" placeholder="Sub title"
                          class="form-control"></textarea>
                <div class="col-12"><br/></div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label for="keywords" class="form-label">Keywords (dc:keywords)</label>
                <textarea v-model="keywords" type="text" id="keywords" name="keywords" placeholder="Keywords"
                          class="form-control"></textarea>
                <div class="col-12"><br/></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">Authors (dc:creator)</div>

            <div class="row" v-for="(author, index) in authors" :key="author.email">

                <div class="col-2">
                    <input v-model="author.given_name" type="text"
                           placeholder="Given name"
                           class="form-control"/>
                </div>
                <div class="col-3">
                    <input v-model="author.family_name" type="text"
                           placeholder="Family name"
                           class="form-control"/>
                </div>
                <div class="col-3">
                    <input v-model="author.email" type="email"
                           placeholder="Email"
                           class="form-control"/>
                </div>
                <div class="col-3">
                    <select v-model="author.institution"
                            class="form-select">
                        <option value="" disabled selected hidden>Institution</option>
                        <option v-for="institution in institutions">{{ institution }}</option>
                    </select>
                </div>
                <div class="col-1">
                    <a class="btn btn-outline-secondary"
                       v-on:click="removeAuthor(index)">
                        <img src="assets/img/trash.svg" alt="Del"
                             style="height: 20px;"/></a>
                </div>
                <div class="col-12"><br/></div>
            </div>

            <div class="col-12">
                <button class="btn btn-outline-secondary" v-on:click="addAuthor">Add author</button>
                <div class="col-12"><br/></div>
            </div>
        </div>

        <div class="col-12">
            <label for="abstract" class="form-label">Abstract (dc:abstract)</label>
            <textarea id="abstract" name="abstract" class="form-text" v-model="abstract"
                      placeholder="Abstract"></textarea>
            <div class="col-12"><br/></div>
        </div>

        <div class="col-12">
            <label for="abstract" class="form-label">Identifier (dc:identifier.uri)</label>
            <textarea id="identifier" name="identifier" class="form-text" v-model="identifier"
                      placeholder="Identifier"></textarea>
            <div class="col-12"><br/></div>
        </div>

        <div class="col-12">
            <label for="body" class="form-label">Body (dc:body?)</label>
            <textarea id="body" name="body" class="form-text" v-model="body"
                      placeholder="Body"></textarea>
            <div class="col-12"><br/></div>
        </div>

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
        <div id="preview">{{ preview }}</div>
    </div>

</div>

<?php require_once('footer.php'); ?>

<script>
    const {createApp} = Vue;

    let vueApp = createApp({
        data() {
            return {
                documentName: 'Document example 4',
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
                return JSON.stringify({
                    'dc:title': this.title,
                    'dc:subtitle': this.sub_title,
                    'dc:identifier': this.identifier,
                    'dc:keywords': this.keywords,
                    'dc:creator': this.authors,
                    'dc:abstract': this.abstract,
                    'dc:body': this.body
                });
            }
        }
    });

    vueApp.mount('#app');

</script>
