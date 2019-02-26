@extends('_layouts.master')

@section('body')

<div class="h-16 text-cyan pointer-none fixed w-full text-center pin-t pt-3">
    @include('_svg.logo')
</div>
<div class="flex items-center justify-center h-screen w-screen border-t-4 border-blue">
    <div class="text-center">

        <div class="text-6xl mb-4">
            {{ $page->siteName ?? 'K-Link' }}
        </div>

        <div class="text-lg flex justify-around flex-row md:flex-column">
            <a class="no-underline text-grey-darker p-2 hover:text-blue focus:text-blue active:text-blue-darker" href="https://k-link.technology">News</a>
            <a class="no-underline text-grey-darker p-2 hover:text-blue focus:text-blue active:text-blue-darker" href="https://k-link.technology">Documentation</a>
            <a class="no-underline text-grey-darker p-2 hover:text-blue focus:text-blue active:text-blue-darker" href="https://github.com/k-box/k-link">Contribute</a>
        </div>
    </div>
</div>



@endsection
