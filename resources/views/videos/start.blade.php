<x-app-layout>
  <div class="max-w-7xl mx-auto p-3 sm:p-4">
    <div class="rounded-2xl bg-white/5 border border-white/10 overflow-hidden">
      <div class="gradient-header p-6 text-white flex items-center justify-between">
        <div>
          <h1 class="font-bold text-2xl">Video Call</h1>
          <p class="text-white/80 mt-1">{{ $contact->name ?? $contact->mobile }}</p>
        </div>
        <a href="{{ route('chats.show', $contact) }}" class="px-4 py-2 rounded-xl border border-white/20 text-white hover:bg-white/5 transition-all">
          Back to Chat
        </a>
      </div>

      <div class="p-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
          <!-- Video Area -->
          <div class="lg:col-span-2">
            <div class="rounded-2xl bg-black aspect-video flex items-center justify-center border border-white/10">
              <div class="text-center">
                <svg class="w-16 h-16 mx-auto mb-4 text-slt-muted opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                </svg>
                <p class="text-slt-muted">Video stream will appear here</p>
              </div>
            </div>

            <!-- Video Controls -->
            <div class="mt-6 flex items-center justify-center gap-4">
              <button class="w-14 h-14 rounded-full bg-red-600 hover:bg-red-700 flex items-center justify-center text-white transition-all" title="End call">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
              </button>
              <button class="w-14 h-14 rounded-full bg-slt-primary hover:opacity-90 flex items-center justify-center text-white transition-all" title="Mute/Unmute">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
              </button>
            </div>
          </div>

          <!-- Contact Info & Details -->
          <div>
            <div class="rounded-2xl bg-white/5 border border-white/10 p-4">
              <div class="flex items-center gap-3 mb-4">
                <div class="w-12 h-12 rounded-full bg-slt-info flex items-center justify-center text-white font-semibold">
                  {{ strtoupper(substr($contact->name ?? $contact->mobile, 0, 1)) }}
                </div>
                <div>
                  <div class="font-semibold text-white">{{ $contact->name ?? $contact->mobile }}</div>
                  <div class="text-xs text-slt-muted">{{ $contact->mobile }}</div>
                </div>
              </div>

              <div class="space-y-3 border-t border-white/10 pt-4">
                <div class="flex items-center justify-between text-sm">
                  <span class="text-slt-muted">Status</span>
                  <span class="flex items-center gap-1">
                    <span class="w-2 h-2 rounded-full bg-green-500"></span>
                    <span class="text-white">Ready</span>
                  </span>
                </div>
                <div class="flex items-center justify-between text-sm">
                  <span class="text-slt-muted">Duration</span>
                  <span class="text-white">00:00</span>
                </div>
                <div class="flex items-center justify-between text-sm">
                  <span class="text-slt-muted">Quality</span>
                  <span class="text-white">HD</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Info Message -->
        <div class="mt-6 p-4 rounded-xl border border-slt-info/30 bg-slt-info/10">
          <div class="flex items-start gap-3">
            <svg class="w-5 h-5 text-slt-info flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div class="text-sm text-white">
              <p class="font-semibold mb-1">Video Integration Required</p>
              <p class="text-slt-muted">This is a placeholder interface. To enable video calls, integrate a video conferencing service like Twilio, Agora, or JitsiMeet.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
