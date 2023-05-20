@include('structure/header')

<!-- Your content here -->
<main>
    <div class="d-flex align-items-center justify-content-center hero-image">
        <div class="hero-text text-center w-100">
            <h1>Quizzer: Quiz Contest!</h1>
            <p>Test and continue to expand your knowledge with the Quizzer app. Thousands of questions on hundreds of different topics await you.</p>
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Register Now</a>
        </div>
    </div>

    <section class="container features mt-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Hundreds of Quizzes</h5>
                        <p class="card-text">Test your knowledge with hundreds of quizzes on different topics.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Development Analysis</h5>
                        <p class="card-text">Analyze your quiz results and track your progress.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Learn New Information</h5>
                        <p class="card-text">Learn new information and expand your knowledge through quizzes.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@include('structure/footer')
