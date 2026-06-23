<x-app-layout>
  <div class="max-w-7xl mx-auto p-3 sm:p-4">
    <!-- Header -->
    <div class="mb-4 flex items-center justify-between">
      <div>
        <h1 class="text-2xl font-bold text-white">Jitsi Meeting</h1>
        <p class="text-sm text-slt-muted">Video Conference Room</p>
      </div>
      <a href="{{ route('chats.index') }}" class="px-4 py-2 rounded-xl bg-red-600 text-white hover:bg-red-700 text-sm font-medium transition-all">
        Leave
      </a>
    </div>

    <!-- Jitsi Container -->
    <div id="jitsi-container" style="height: 700px;" class="rounded-2xl overflow-hidden border border-white/10"></div>
  </div>

  <script src="https://meet.jit.si/external_api.js"></script>

  <script>
    const domain = "meet.jit.si";
    const options = {
      roomName: "SLTDemoRoom123",
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
