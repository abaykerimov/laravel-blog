Vue.component('post-list', {
    data: function () {
        return {
            posts: null,
        }
    },
    methods: {
        getPosts() {
            axios.get('/api/admin/post').then(response => {
                this.posts = response.data;
            });
        }
    },
    created() {
        this.getPosts();
    },
    template: `
    <div>
        <ul class="list-group" id="accordion">
            <li class="list-group-item" v-for="post in posts">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" :href="'#collapse'+post.id" v-text="post.title"></a>
                        <a class="icon btn-post-create" :href="'/admin/posts/' + post.id"><i class="fe fe-edit"></i></a>
                        <button class="btn btn-outline-primary btn-sm btn-post-create" data-toggle="modal" data-target="#createChild"><i class="fe fe-plus"></i> Создать</button>
                    </h4>
                </div>
                <div :id="'collapse'+post.id" class="panel-collapse collapse in">
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                            <thead>
                            <tr>
                                <th class="w-1">ID</th>
                                <th>Название</th>
                                <th>Статус</th>
                                <th>Дата создания</th>
                                <!--<th></th>-->
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="child in post.children">
                                <td><span class="text-muted" v-text="child.id"></span></td>
                                <td><a href="invoice.html" class="text-inherit" v-text="child.title"></a></td>
                                <td>
                                    <span class="status-icon bg-success"></span> Опубликовано
                                </td>
                                <td v-text="child.created_at"></td>
                                <!--<td class="text-right">-->
                                    <!--<a href="javascript:void(0)" class="btn btn-secondary btn-sm">Manage</a>-->
                                    <!--<div class="dropdown">-->
                                        <!--<button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button>-->
                                    <!--</div>-->
                                <!--</td>-->
                                <td>
                                    <a class="icon" :href="'/admin/posts/' + child.id">
                                        <i class="fe fe-edit"></i>
                                    </a>
                                </td>
                            </tr>                     
                            </tbody>
                        </table>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    `
});

Vue.component('post-create', {
    props: ['type'],
    data: function () {
        return {
            data: {
                title: null,
                post_id: null,
            },
            parents: {},
        }
    },
    methods: {
        addPost(data) {
            axios.post('/api/admin/post', {title: data.title, post_id: data.post_id}).then(response => {
                window.location = '/admin/posts/' + response.data.id;
            });
        },
        getParents() {
            axios.get('/api/admin/post').then(response => {
                this.parents = response.data;
                console.log(this.type);
            });
        }
    },
    created() {
        this.getParents();
    },
    template: `
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Создать</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>
            <form method="post" @submit.prevent="addPost(data)">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Название</label>
                        <input type="text" class="form-control" 
                            name="title" 
                            placeholder="Название рассказа" 
                            v-model="data.title"
                            required
                        >
                    </div>
                    <div class="form-group" v-if="type">
                        <label class="form-label">Рассказ</label>
                        <select class="form-control" name="post_id" v-model="data.post_id" required>
                            <option v-for="parent in parents" :value="parent.id" v-text="parent.title"></option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Сохранить</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </form>
        </div>
    </div>
    `
});

Vue.component('post-details', {
    props: {
        id: {
            type: Number,
            required: true
        }
    },
    data: function () {
        return {
            data: {},
            alert: null,
        }
    },
    methods: {
        getPost() {
            axios.get('/api/admin/post/' + this.id).then(response => {
                this.data = response.data;
            });
        },
        updatePost() {
            axios.put('/api/admin/post/' + this.id, {params: this.data}).then(response => {
                this.data = response.data.data;
                this.alert = response.data.title;
            });
        },
        onImageChange(e){
            this.data.image = e.target.files[0];
        },

        upload() {
            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            };
            let formData = new FormData();
            formData.append('image', this.data.image);

            axios.post('/api/admin/post/upload', formData, config).then(response => {
                this.alert = response.data.title;
                this.data.image = response.data.location;
            });
        }
    },
    created() {
        this.getPost();
    },
    template: `
    <div>
        <alert v-if="alert" :title="alert"></alert>
        <form class="card" method="post" @submit.prevent="updatePost()">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" v-if="data.post_id">
                            <label class="form-label">Изображение</label>
                            <div class="file-upload">
                                <label for="upload" class="file-upload-label"><i class="fe fe-file-plus"></i> Выбрать</label>
                                <input type="file" class="form-control file-upload-input" v-on:change="onImageChange">
                            </div>
                            <button type="button" @click="upload" class="btn btn-outline-primary btn-sm">Загрузить</button>                       
                            <span v-if="data.image" v-text="data.image"></span>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Название</label>
                            <input class="form-control" 
                                name="title" 
                                placeholder="Название рассказа" 
                                v-model="data.title"
                                required
                            >
                        </div>
                        <div class="form-group" v-if="data.post_id">
                            <label class="form-label">Краткое описание</label>
                            <textarea class="form-control" v-model="data.description"></textarea>
                        </div>
                        <div class="form-group" v-if="data.post_id">
                            <label class="form-label">Описание</label>
                            <tinymce-editor class="form-control" v-model="data.body"></tinymce-editor>
                        </div>
                        <div class="form-group">
                            <label class="custom-switch">
                                <input type="checkbox" name="published" class="custom-switch-input" v-model="data.published">
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Опубликовано</span>
                            </label>
                        </div>
                        <div class="form-group" v-if="!data.post_id">
                            <label class="custom-switch">
                                <input type="checkbox" name="finished" class="custom-switch-input" v-model="data.finished">
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Готово</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <div class="d-flex">
                    <button class="btn btn-primary ml-auto">Сохранить</button>
                    <a href="/admin/posts" class="btn btn-link">Отмена</a>
                </div>
            </div>
        </form>
    </div>
    `
});

Vue.component('tinymce-editor', {
    data: function () {
        return {
            tinymceOptions : {
                selector: "textarea",
                theme: "modern",
                paste_data_images: true,
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor colorpicker textpattern"
                ],
                toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                toolbar2: "print preview media | forecolor backcolor emoticons",
                images_upload_url: '/api/admin/post/upload',
                images_upload_handler: function (blobInfo, success, failure) {
                    const config = {
                        headers: { 'content-type': 'multipart/form-data' }
                    };
                    let formData = new FormData();
                    formData.append('image', blobInfo.blob(), blobInfo.filename());

                    axios.post('/api/admin/post/upload', formData, config)
                        .then(function (response) {
                            success(response.data.location);
                        });
                },
            }
        }
    },
    template: '<textarea rows="16">{{value}}</textarea>',
    props: ['value'],
    mounted: function() {
        var vm = this,
            options = $.extend(true, {}, this.tinymceOptions); // use jquery temporary

        // make an deep copy of options;should not modify tinymceOptions
        options.selector = undefined;
        options.target = vm.$el; // use options.target instand of options.selector
        var oldSetup = options.setup || function() {};
        options.setup = function(editor) {
            console.log("setup");
            
            //Decorate origni one
            oldSetup(editor);

            // Bind keyup
            editor.on('keyup', function(e) {
                // update model value;
                var value = editor.getContent();
                // Dom to model,this was a problem,when input in editor ? it will focus in the first line first word;
                vm.$emit('input', value); // who recieve this event?
            });

            editor.on('blur', function() {
                vm.allowSetContent=true;
            });

            editor.on('focus', function() {
                vm.allowSetContent = false;
            })
        };

        tinymce.init(options).then(function(editors) {
            vm.editor = editors[0];
        })
    },
    watch: {
        value:function(content)
        {
            if(this.editor && this.allowSetContent)
            {
                // setContent will let editor focus in first line and first world
                this.editor.setContent(content);
            }
        }
    }
});


Vue.component('alert', {
    props: ['status', 'title'],
    data: function () {
        return {
            dismissSecs: 4,
            dismissCountDown: 0,
        }
    },
    template: `
    <div>
        <b-alert class="b-alert-custom" 
                    :show="dismissCountDown" 
                    variant="success" 
                    @dismissed="dismissCountDown = 0" 
                    @dismiss-count-down="countDownChanged">{{ title }}</b-alert>
    </div>`,
    methods: {
        countDownChanged (dismissCountDown) {
            this.dismissCountDown = dismissCountDown
        },
        showAlert () {
            this.dismissCountDown = this.dismissSecs
        }
    },
    created() {
        this.showAlert();
    }
});
new Vue({
    el: '#app',
});