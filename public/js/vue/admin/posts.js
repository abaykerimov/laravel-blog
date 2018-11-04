var postsComponent = Vue.component('post-list', {
    data: function () {
        return {
            posts: null,
        }
    },
    methods: {
        getPosts() {
            axios.get('api/admin/post').then(response => {
                this.posts = response.data;
            });
        }
    },
    created() {
        this.getPosts();
    },
    filters: {
        truncate: function (str, charLimit = 500) {
            if (str.length < 500) return str;
            return `${str.slice(0, charLimit)}...`;
        }
    },
    template: `
    <ul class="list-group" id="accordion" v-for="post in posts">
        <li class="list-group-item" v-for="child in post.children">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" v-bind="post.title"></a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                        <tr>
                            <th class="w-1">ID</th>
                            <th>Название</th>
                            <th>Статус</th>
                            <th>Дата создания</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><span class="text-muted" v-bind="child.id"></span></td>
                            <td><a href="invoice.html" class="text-inherit" v-bind="child.title"></a></td>
                            <td>
                                <span class="status-icon bg-success"></span> Paid
                            </td>
                            <td v-bind="child.created_at"></td>
                            <td class="text-right">
                                <a href="javascript:void(0)" class="btn btn-secondary btn-sm">Manage</a>
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button>
                                </div>
                            </td>
                            <td>
                                <a class="icon" href="javascript:void(0)">
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
    `
});

// new Vue({
//     el: '#app',
//     components: {
//         'post-list' : postsComponent,
//     }
// });