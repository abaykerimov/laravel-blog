var postsComponent = Vue.component('post-list', {
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
                                    <span class="status-icon bg-success"></span> Paid
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

var postDetailsComponent = Vue.component('post-details', {
    props: {
        id: {
            type: Number,
            required: true
        }
    },
    data: function () {
        return {
            data: {},
        }
    },
    methods: {
        getPost() {
            axios.get('/api/admin/post/' + this.id).then(response => {
                this.data = response.data;
                // console.log(this.data);
            });
        },
        updatePost(post) {
            console.log(post);
            axios.put('/api/admin/post/' + this.id, {params: post}).then(response => {
                this.data = response.data;
            });
        }
    },
    created() {
        this.getPost();
    },
    template: `
    <div>  
        <form class="card" method="post" @submit.prevent="updatePost(data)">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Название</label>
                            <input class="form-control" 
                                name="title" 
                                placeholder="Название рассказа" 
                                v-model="data.title"
                            >
                        </div>
                        <div class="form-group">
                            <label class="form-label">Описание</label>
                            <textarea id="editor" class="form-control" 
                                name="body" 
                                rows="16" 
                                placeholder="Описание рассказа" 
                                v-tinymce-editor="data.body"
                            >{{ data.body }}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-label">Статус</div>
                            <label class="custom-switch">
                                <input type="checkbox" name="published" class="custom-switch-input" v-model="data.published">
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Опубликовано</span>
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

var postCreateComponent = Vue.component('post-create', {
    data: function () {
        return {
            data: {
                title: ''
            },
        }
    },
    methods: {
        addPost(data) {
            console.log(this.data);
            axios.post('/api/admin/post', {title: data.title}).then(response => {
                window.location = '/admin/posts/' + response.data.id;
            });
        }
    },
    template: `
    <div>  
        <form method="post" @submit.prevent="addPost(data)">
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Название</label>
                    <input type="text" class="form-control" 
                        name="title" 
                        placeholder="Название рассказа" 
                        v-model="data.title"
                    >
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Сохранить</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </form>
    </div>
    `
});

// tinymce directive
Vue.directive('tinymce-editor',{
    twoWay: true,
    bind: function() {
        var self = this;
        console.log(self);
        tinymce.init({
            selector: 'textarea',
            setup: function(editor) {
                // self.value = tinymce.get('editor').getContent();

                // init tinymce
                editor.on('init', function() {
                    tinymce.get('editor').setContent(self.value);
                });
                console.log(tinyMCE.get('editor'));
                console.log(self.value);

                // when typing keyup event
                editor.on('keyup change', function() {

                    // get new value
                    var new_value = tinymce.get('editor').getContent(self.value);

                    // set model value
                    self.set(new_value)
                });
            }
        });
    },
    update: function(newVal, oldVal) {
        // set val and trigger event
        $(this.el).val(newVal).trigger('keyup');
    }

});


new Vue({
    el: '#app',
    components: {
        'post-list' : postsComponent,
        'post-details' : postDetailsComponent,
        'post-create' : postCreateComponent,
        // 'editor': Editor
    }
});