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
        },
        moment: function (date) {
            return moment(date).format('MMMM D, YY');
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
                <div class="posted-date" v-text="moment(post.created_at)"></div><!-- .posted-date -->
    
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
            <div class="post-share flex align-items-center order-3 order-lg-1">
                    <label>Share</label>
                    <social-sharing :url="'https://aisha.dev.kerimov.kz/posts/' + post.id"
                                :title="post.title"
                                :description="post.description"
                                :hashtags="post.keywords"
                                inline-template>
                        <div>  
                            <network network="vk">
                                <i class="fa fa-vk"></i>
                            </network>
                            <network network="facebook">
                                <i class="fa fa-facebook"></i>
                            </network>
                            <network network="googleplus">
                                <i class="fa fa-google-plus"></i>
                            </network>
                            <network network="telegram">
                                <i class="fa fa-telegram"></i>
                            </network>
                            <network network="twitter">
                                <i class="fa fa-twitter"></i>
                            </network>
                        </div>
                    </social-sharing> 
                </div>

            <a class="read-more order-2" :href="'/posts/'+post.id">Read more</a>

            <div class="comments-count order-1 order-lg-3">
                <a href="#">2 Comments</a>
            </div><!-- .comments-count -->
        </footer><!-- .entry-footer -->
        </div><!-- .content-wrap -->
        <!--<div class="pagination">-->
            <!--<ul class="flex align-items-center">-->
                <!--<li class="active"><a href="#">1</a></li>-->
                <!--<li><a href="#">2</a></li>-->
                <!--<li><a href="#">3</a></li>-->
            <!--</ul>-->
        <!--</div>-->
    </div>
    `
});
Vue.component('post-detail', {
    props: ['id'],
    data: function () {
        return {
            post: null,
            liked: false,
        }
    },
    methods: {
        getPost() {
            axios.get('/api/post/' + this.id).then(response => {
                this.post = response.data;
            });
        },
        moment: function (date) {
            return moment(date).format('MMMM D, YY');
        },
        checkLike() {
            axios.get('/api/' + this.id + '/like/check').then(response => {
                this.liked = response.data;
            });
        },
        like() {
            !this.liked ? axios.post('/api/like', {post_id: this.id}).then(response => {
                console.log(response);
            }) : false;
        }
    },
    created() {
        this.getPost();
        this.checkLike();
    },
    template: `
    <div v-if="post">
        <div class="content-wrap">
            <header class="entry-header">
                <div class="posted-date" v-text="moment(post.created_at)"></div><!-- .posted-date -->
    
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
    
                <!--<blockquote class="blockquote-text">-->
                    <!--<p>Nullam non nisi ut dolor pellentesque eleifend. Aliquam commodo vitae risus malesuada varius. Nulla ornare lacus eu elit sollicitudin varius. Nulla aliquet ornare massa id tempor. Sed luctus dui non turpis sodales, ac tristique risus consequat. Donec tincidunt mi a magna rhoncus dapibus. Integer ut lectus euismod</p>-->
                <!--</blockquote>&lt;!&ndash; .blockquote-text &ndash;&gt;-->
            <div class="entry-content" v-html="post.body">
    
            </div><!-- .entry-content -->
    
            <footer class="entry-footer flex flex-column flex-lg-row justify-content-between align-content-start align-lg-items-center">
                <div class="post-share flex align-items-center order-3 order-lg-1">
                    <label>Share</label>
                    <social-sharing :url="'https://aisha.dev.kerimov.kz/posts/' + post.id"
                                :title="post.title"
                                :description="post.description"
                                :hashtags="post.keywords"
                                inline-template>
                        <div>  
                            <network network="vk">
                                <i class="fa fa-vk"></i>
                            </network>
                            <network network="facebook">
                                <i class="fa fa-facebook"></i>
                            </network>
                            <network network="googleplus">
                                <i class="fa fa-google-plus"></i>
                            </network>
                            <network network="telegram">
                                <i class="fa fa-telegram"></i>
                            </network>
                            <network network="twitter">
                                <i class="fa fa-twitter"></i>
                            </network>
                        </div>
                    </social-sharing> 
                </div>
    
                <div class="order-1 order-lg-3">
                    <input type="radio" id="checkbox" :checked="liked" @click="like()">
                    <label for="checkbox">
                      <svg id="heart-svg" viewBox="467 392 58 57" xmlns="http://www.w3.org/2000/svg">
                        <g id="Group" fill="none" fill-rule="evenodd" transform="translate(467 392)">
                          <path d="M29.144 20.773c-.063-.13-4.227-8.67-11.44-2.59C7.63 28.795 28.94 43.256 29.143 43.394c.204-.138 21.513-14.6 11.44-25.213-7.214-6.08-11.377 2.46-11.44 2.59z" id="heart" fill="#AAB8C2"/>
                          <circle id="main-circ" fill="#E2264D" opacity="0" cx="29.5" cy="29.5" r="1.5"/>
                
                          <g id="grp7" opacity="0" transform="translate(7 6)">
                            <circle id="oval1" fill="#9CD8C3" cx="2" cy="6" r="2"/>
                            <circle id="oval2" fill="#8CE8C3" cx="5" cy="2" r="2"/>
                          </g>
                
                          <g id="grp6" opacity="0" transform="translate(0 28)">
                            <circle id="oval1" fill="#CC8EF5" cx="2" cy="7" r="2"/>
                            <circle id="oval2" fill="#91D2FA" cx="3" cy="2" r="2"/>
                          </g>
                
                          <g id="grp3" opacity="0" transform="translate(52 28)">
                            <circle id="oval2" fill="#9CD8C3" cx="2" cy="7" r="2"/>
                            <circle id="oval1" fill="#8CE8C3" cx="4" cy="2" r="2"/>
                          </g>
                
                          <g id="grp2" opacity="0" transform="translate(44 6)">
                            <circle id="oval2" fill="#CC8EF5" cx="5" cy="6" r="2"/>
                            <circle id="oval1" fill="#CC8EF5" cx="2" cy="2" r="2"/>
                          </g>
                
                          <g id="grp5" opacity="0" transform="translate(14 50)">
                            <circle id="oval1" fill="#91D2FA" cx="6" cy="5" r="2"/>
                            <circle id="oval2" fill="#91D2FA" cx="2" cy="2" r="2"/>
                          </g>
                
                          <g id="grp4" opacity="0" transform="translate(35 50)">
                            <circle id="oval1" fill="#F48EA7" cx="6" cy="5" r="2"/>
                            <circle id="oval2" fill="#F48EA7" cx="2" cy="2" r="2"/>
                          </g>
                
                          <g id="grp1" opacity="0" transform="translate(24)">
                            <circle id="oval1" fill="#9FC7FA" cx="2.5" cy="3" r="2"/>
                            <circle id="oval2" fill="#9FC7FA" cx="7.5" cy="2" r="2"/>
                          </g>
                        </g>
                      </svg>
                    </label>
                </div>
                <!--<div class="comments-count order-1 order-lg-3">-->
                    <!--<a href="#">2 Comments</a>-->
                <!--</div>&lt;!&ndash; .comments-count &ndash;&gt;-->
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

Vue.use(SocialSharing);
new Vue({
    el: '#app',
});