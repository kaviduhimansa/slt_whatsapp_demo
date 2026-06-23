<x-app-layout>
  <div class="max-w-7xl mx-auto p-3 sm:p-4">
    <!-- Header -->
    <div class="mb-4 flex items-center justify-between">
      <div class="flex items-center gap-3">
        <a href="{{ route('chats.show', $contact->id) }}" class="text-slt-muted hover:text-white">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
        </a>
        <div>
          <h1 class="text-xl font-bold text-white">{{ $contact->name ?? $contact->mobile }}</h1>
          <p class="text-sm text-slt-muted">Video Call in Progress</p>
        </div>
      </div>
      <form action="{{ route('video.end', $roomName) }}" method="POST">
        @csrf
        <button type="submit" class="px-4 py-2 rounded-xl bg-red-600 text-white hover:bg-red-700 text-sm font-medium transition-all">
          End Call
        </button>
      </form>
    </div>

    <!-- Jitsi Container -->
    <div id="jitsi-container" style="height: 700px;" class="rounded-2xl overflow-hidden border border-white/10"></div>
  </div>

  <script src="https://meet.jit.si/external_api.js"></script>

  <script>
    const domain = "meet.jit.si";
    const options = {
      roomName: "{{ $roomName }}",
      width: "100%",
      height: 700,
      parentNode: document.querySelector('#jitsi-container'),
      userInfo: {
        displayName: "{{ auth()->user()->name }}"
      }
    };
    const api = new JitsiMeetExternalAPI(domain, options);
  </script>
</x-app-layout>
