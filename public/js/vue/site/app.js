var postsComponent = Vue.component('post-list', {
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
    <div class="col-12 col-lg-9">
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
    
            <!--<figure class="featured-image">-->
                <!--<img src="{{ asset('images/layout/1.jpg') }}" alt="">-->
            <!--</figure>&lt;!&ndash; .featured-image &ndash;&gt;-->
    
            <div class="entry-content"><p>{{ post.body | truncate }}</p></div><!-- .entry-content -->
    
            <footer class="entry-footer flex flex-column flex-lg-row justify-content-between align-content-start align-lg-items-center">
            <ul class="post-share flex align-items-center order-3 order-lg-1">
                <label>Share</label>
                <li><a href="#"><i class="fa fa-vk"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul><!-- .post-share -->

            <a class="read-more order-2" href="">Read more</a>

            <div class="comments-count order-1 order-lg-3">
                <a href="#">2 Comments</a>
            </div><!-- .comments-count -->
        </footer><!-- .entry-footer -->
        </div><!-- .content-wrap -->
    </div>
    `
});

new Vue({
    el: '#app',
    components: {
        'post-list' : postsComponent,
    }
});