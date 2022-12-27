<div class="btm-nav bg-neutral text-white">
    <a href={{ route('/') }} class="w-32">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
    </a>
    @if (auth()->user()->level_id == 2)
        <a href={{ route('pomodoro') }} class="w-32">
            <i class="fa-regular fa-clock"></i>
        </a>
    @endif
    @if (auth()->user()->level_id == 1)
        <a href={{ route('recordinterval') }} class="w-32">
            <i class="fa-regular fa-clock"></i>
        </a>
    @endif
    <a href={{ route('profile') }} class="w-32">
        <i class="fa-solid fa-user"></i>
    </a>
</div>
