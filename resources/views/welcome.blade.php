<x-layout>

    <x-hero></x-hero>
    
    <x-about :skills="$skills"></x-about>

    <x-experience :experiences="$experiences"></x-experience>

    <x-project :projects="$projects" :projectcategories="$projectcategories"></x-project>
    
    <x-blog :blogs="$blogs" :blogcategories="$blogcategories"></x-blog>

    {{-- <x-show></x-show> --}}

    <x-contact></x-contact>

</x-layout>