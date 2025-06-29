<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <a href="/posts" class="text-blue-600 font-medium bg-blue-200 rounded px-3 py-2 text-md">&laquo;
                        Back to all posts</a>
                    <address class="flex items-center my-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                alt="{{ $post->author->name }}">
                            <div>
                                <a href="/posts?author={{ $post->author->username }}" rel="author"
                                    class="text-xl font-bold text-gray-900 hover:underline">
                                    {{ $post->author->name }}
                                </a>
                                <p class="text-base text-gray-500 mb-2">{{ $post->created_at->diffForHumans() }}</p>
                                <a href="/posts?category={{ $post->category->slug }}">
                                    <span
                                        class="bg-{{ $post->category->color }}-200 text-{{ $post->category->color }}-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded">
                                        {{ $post->category->name }}
                                    </span>
                                </a>
                            </div>
                        </div>
                    </address>
                    <h1 class="mb-4 text-3xl font-bold leading-tight text-gray-900 lg:mb-6 lg:text-3xl">
                        {{ $post->title }}
                    </h1>
                </header>
                <p class="lead text-gray-500">{{ $post->body }}</p>
            </article>
        </div>
    </main>
</x-layout>