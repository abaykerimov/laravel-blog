Vue.component('post-list', {
    data: function () {
        return {
            posts: null,
        }
    },
    methods: {
        getPosts() {
            axios.get('api/post').then(response => {
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
    <div class="col-12 col-lg-9" v-if="posts">
        <div class="content-wrap" v-for="post in posts">
            <header class="entry-header">
                <div class="posted-date" v-text="post.created_at"></div><!-- .posted-date -->
    
                <h2 class="entry-title" v-text="post.title"></h2>
    
                <div class="tags-links">
                    <a href="#">#winter</a>
                    <a href="#">#love</a>
                    <a href="#">#snow</a>
                    <a href="#">#january</a>
                </div><!-- .tags-links -->
            </header><!-- .entry-header -->
    
            <figure class="featured-image">
                <img :src="post.image" alt="">
            </figure><!-- .featured-image -->
    
            <div class="entry-content"><p v-text="post.description"></p></div><!-- .entry-content -->
    
            <footer class="entry-footer flex flex-column flex-lg-row justify-content-between align-content-start align-lg-items-center">
            <ul class="post-share flex align-items-center order-3 order-lg-1">
                <label>Share</label>
                <li><a href="#"><i class="fa fa-vk"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul><!-- .post-share -->

            <a class="read-more order-2" :href="'/posts/'+post.id">Read more</a>

            <div class="comments-count order-1 order-lg-3">
                <a href="#">2 Comments</a>
            </div><!-- .comments-count -->
        </footer><!-- .entry-footer -->
        </div><!-- .content-wrap -->
    </div>
    `
});
Vue.component('post-detail', {
    props: ['id'],
    data: function () {
        return {
            post: null,
        }
    },
    methods: {
        getPost() {
            axios.get('/api/post/' + this.id).then(response => {
                this.post = response.data;
            });
        }
    },
    created() {
        this.getPost();
    },
    template: `
    <div v-if="post">
        <div class="content-wrap">
            <header class="entry-header">
                <div class="posted-date">
                    January 30, 2018
                </div><!-- .posted-date -->
    
                <h2 class="entry-title" v-text="post.title"></h2>
    
                <div class="tags-links">
                    <a href="#">#test</a>
                    <a href="#">#test</a>
                    <a href="#">#test</a>
                    <a href="#">#test</a>
                </div><!-- .tags-links -->
            </header><!-- .entry-header -->
    
            <figure class="featured-image">
                <img :src="post.image" alt="">
            </figure><!-- .featured-image -->
    
            <div class="entry-content" v-html="post.body">
    
                <!--<blockquote class="blockquote-text">-->
                <!--    <p>Nullam non nisi ut dolor pellentesque eleifend. Aliquam commodo vitae risus malesuada varius. Nulla ornare lacus eu elit sollicitudin varius. Nulla aliquet ornare massa id tempor. Sed luctus dui non turpis sodales, ac tristique risus consequat. Donec tincidunt mi a magna rhoncus dapibus. Integer ut lectus euismod</p>-->
                <!--</blockquote>&lt;!&ndash; .blockquote-text &ndash;&gt;-->
    
            </div><!-- .entry-content -->
    
            <!--<div class="row">-->
                <!--<div class="col-12 col-md-6">-->
                    <!--<figure class="blog-page-half-img">-->
                        <!--<img src="{{ asset('images/layout/blog-img-1.png') }}" alt="">-->
                    <!--</figure>&lt;!&ndash; .blog-page-half-img &ndash;&gt;-->
                <!--</div>&lt;!&ndash; .col &ndash;&gt;-->
    <!---->
                <!--<div class="col-12 col-md-6">-->
                    <!--<figure class="blog-page-half-img">-->
                        <!--<img src="{{ asset('images/layout/blog-img-2.png') }}" alt="">-->
                    <!--</figure>&lt;!&ndash; .blog-page-half-img &ndash;&gt;-->
                <!--</div>&lt;!&ndash; .col &ndash;&gt;-->
            <!--</div>&lt;!&ndash; .row &ndash;&gt;-->
    
            <footer class="entry-footer flex flex-column flex-lg-row justify-content-between align-content-start align-lg-items-center">
                <ul class="post-share flex align-items-center order-3 order-lg-1">
                    <label>Share</label>
                    <li><a href="#"><i class="fa fa-vk"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                </ul><!-- .post-share -->
    
                <div class="comments-count order-1 order-lg-3">
                    <a href="#">2 Comments</a>
                </div><!-- .comments-count -->
            </footer><!-- .entry-footer -->
        </div><!-- .content-wrap -->
    </div>
    `
});
Vue.component('post-comments', {
    props: ['id'],
    data: function () {
        return {
            comments: null,
            comment: {
                user_name: null,
                body: null
            },
        }
    },
    methods: {
        getComments() {
            axios.get('/api/post/' + this.id + '/comments').then(response => {
                this.comments = response.data;
            });
        },
        addComment() {
            axios.post('/api/post/' + this.id + '/comments', {name: this.comment.user_name, body: this.comment.body, post_id: this.id}).then(response => {
                this.comments.push(this.comment);
                this.comment = {};
            });
        },
        moment: function (date) {
            return moment(date).format('MMM D, YY');
        }
    },
    created() {
        this.getComments();
    },
    template: `
    <div v-if="comments">
        <div class="content-area">
            <div class="post-comments" v-if="comments.length > 0">
                <h3 class="comments-title">Комментарии</h3>

                <ol class="comment-list">
                    <li class="comment" v-for="comment in comments">
                        <div class="comment-body flex justify-content-between">
                            <figure class="comment-author-avatar">
                                <img src="/images/layout/user-1.jpg" alt="user">
                            </figure><!-- .comment-author-avatar -->

                            <div class="comment-wrap">
                                <div class="comment-author flex flex-wrap align-items-center">
                                    <span class="fn">
                                        <a href="#" v-text="comment.user_name"></a>
                                    </span><!-- .fn -->

                                    <span class="comment-meta">
                                        <a href="#" v-text="moment(comment.created_at)"></a>
                                    </span><!-- .comment-meta -->

                                    <div class="reply">
                                        <a href="#">Reply</a>
                                    </div><!-- .reply -->
                                </div><!-- .comment-author -->

                                <p v-text="comment.body"></p>

                            </div><!-- .comment-wrap -->
                        </div><!-- .comment-body -->
                    </li><!-- .comment -->
                </ol><!-- .comment-list -->
            </div><!-- .post-comments -->

            <div class="comments-form">
                <div class="comment-respond">
                    <h3 class="comment-reply-title">Оставить комментарий</h3>

                    <form class="comment-form" @submit.prevent="addComment()">
                        <input type="text" placeholder="Имя" v-model="comment.user_name">
                        <textarea rows="18" cols="6" placeholder="Комментарий..." v-model="comment.body"></textarea>
                        <input type="submit" value="Добавить">
                    </form><!-- .comment-form -->
                </div><!-- .comment-respond -->
            </div><!-- .comments-form -->
        </div><!-- .content-area -->
    </div>
    `
});

new Vue({
    el: '#app',
});