<div class="container">
        <div class="url-submit-container" id="urlForm">
            <h1>Submit Your URL</h1>
            <form action="{{ route('short.url') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="big_url" class="form-label">Enter Your Long URL</label>
                    <input type="url" class="form-control" id="big_url" name="big_url" placeholder="https://example.com/your-long-url">
                </div>
                <button type="submit" class="btn btn-custom w-100">Submit URL</button>
            </form>
        </div>
    </div>
    