<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="py-4 px-4 mx-auto max-w-screen-xl lg:py-8 mt-4">
        <div class="mx-auto max-w-screen-md sm:text-center">
            <form>
                @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if(request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                    <div class="relative w-full">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                            </svg>

                        </div>
                        <input
                            class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search for article" type="search" id="search" name="search" required=""
                            autocomplete="off">
                    </div>
                    <div>
                        <button type="submit"
                            class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-blue-700 border-blue-600 sm:rounded-none sm:rounded-r-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{ $posts->links() }}
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-8">
        <div class="grid gap-8 lg:grid-cols-2">
            @forelse($posts as $post)
            <article class="p-6 bg-white-800 rounded-lg border border-gray-200 shadow-md">
                <div class="flex justify-between items-center mb-5 text-gray-500">
                    <a href="/posts?category={{ $post->category->slug }}">
                        <span
                            class="bg-{{ $post->category->color }}-200 text-{{ $post->category->color }}-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded">
                            {{ $post->category->name }}
                        </span>
                    </a>
                    <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                </div>
                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 text-dark hover:underline">
                    <a href="/posts/{{ $post['slug'] }}">
                        {{ $post->title }}
                    </a>
                </h2>
                <p class="mb-5 font-light text-gray-500">
                    {{ Str::limit($post->body, 100) }}
                </p>
                <div class="flex justify-between items-center">
                    <a href="/posts?author={{ $post->author->username }}">
                        <div class="flex items-center space-x-4">
                            <img class="w-7 h-7 rounded-full"
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                alt="{{ $post->author->name }}" />
                            <span class="font-medium text-dark">
                                {{ $post->author->name }}
                            </span>
                        </div>
                    </a>
                    <a href="/posts/{{ $post['slug'] }}"
                        class="inline-flex items-center font-medium text-blue-600 hover:underline">
                        Read more
                        <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </article>
            @empty
            <div>
                <p class="font-semibold text-xl my-2">Article is not found</p>
                <a href="/posts" class="text-blue-600 font-medium py-2 text-md">&laquo;
                    Back to all posts</a>
            </div>
            @endforelse
        </div>
    </div>
    {{ $posts->links() }}
</x-layout>