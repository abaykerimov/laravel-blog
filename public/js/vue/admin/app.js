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
            post: null,
        }
    },
    methods: {
        getPost() {
            axios.get('/api/admin/post/' + this.id).then(response => {
                this.post = response.data;
            });
        },
        updatePost(post) {
            axios.put('/api/admin/post/' + this.id, {params: post}).then(response => {
                this.post = response.data;
            });
        }
    },
    created() {
        this.getPost();
    },
    template: `
    <div v-if="post">  
        <form class="card" method="post" @submit.prevent="">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Название</label>
                            <input type="text" class="form-control" 
                                name="title" 
                                placeholder="Название рассказа" 
                                v-model="post.title"
                            >
                        </div>
                        <div class="form-group">
                            <label class="form-label">Описание</label>
                            <textarea id="editor" class="form-control" 
                                name="description" 
                                rows="16" 
                                placeholder="Описание рассказа" 
                                v-model="post.body"
                                v-tinymce-editor="post.body"
                            ></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <div class="d-flex">
                    <button class="btn btn-primary ml-auto" @click="updatePost(post)">Сохранить</button>
                    <a href="javascript:void(0)" class="btn btn-link">Отмена</a>
                </div>
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
        tinymce.init({
            selector: '#editor',
            setup: function(editor) {

                // init tinymce
                editor.on('init', function() {
                    tinymce.get('editor').setContent(self.value);
                });

                // when typing keyup event
                editor.on('keyup', function() {

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

var editor_config = {
    path_absolute : "{{ url()->to('/') }}/",
    selector: 'textarea',
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }
        tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no"
        });
    }
};
tinymce.init(editor_config);

new Vue({
    el: '#app',
    components: {
        'post-list' : postsComponent,
        'post-details' : postDetailsComponent,
        // 'editor': Editor
    }
});