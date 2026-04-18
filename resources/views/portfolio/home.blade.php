@extends('layouts.app')

@section('title', 'James — Full Stack Developer')
@section('meta_description', 'Full-stack developer specializing in Laravel, Vue.js, and modern web applications.')

@push('styles')
{{-- Apply saved theme before first paint to avoid flash --}}
<script>
    (function(){
        var t = localStorage.getItem('portfolio-theme') || 'dark';
        document.documentElement.setAttribute('data-theme', t);
    })();
</script>
@endpush

@section('content')

{{-- ═══════════════ NAVIGATION ═══════════════ --}}
<nav class="navbar" id="navbar">
    <div class="nav-container">
        <a href="#home" class="nav-logo">James<span class="logo-dot">.</span></a>
        <ul class="nav-links">
            <li><a href="#about" class="nav-link">About</a></li>
            <li><a href="#projects" class="nav-link">Projects</a></li>
            <li><a href="#contact" class="nav-link">Contact</a></li>
            <li><a href="{{ route('admin.login') }}" class="nav-link nav-cta">Admin</a></li>
        </ul>
        <div style="display:flex;align-items:center;gap:10px;">
            <button class="theme-toggle" id="themeToggle" aria-label="Toggle dark/light mode" title="Toggle theme">
                <span class="icon-moon">🌙</span>
                <span class="icon-sun">☀️</span>
            </button>
            <button class="nav-toggle" id="navToggle" aria-label="Toggle menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</nav>


{{-- ═══════════════ HERO ═══════════════ --}}
<section class="hero" id="home">
    <div class="hero-bg">
        <div class="hero-orb hero-orb-1"></div>
        <div class="hero-orb hero-orb-2"></div>
        <div class="hero-orb hero-orb-3"></div>
        <div class="hero-grid"></div>
    </div>
    <div class="hero-content">
        <div class="hero-badge reveal">
            <span class="badge-dot"></span> Available for work
        </div>
        <div class="hero-profile-image reveal" style="margin-bottom: 24px;">
            <img src="{{ asset('img/profile.jpg') }}" alt="James Trinidad" style="width: 140px; height: 140px; border-radius: 50%; object-fit: cover; border: 4px solid var(--primary); box-shadow: 0 8px 32px rgba(99,102,241,0.3);">
        </div>
        <h1 class="hero-title reveal">
            Hi, I'm <span class="gradient-text">James</span><br>
            Full Stack Developer
        </h1>
        <p class="hero-subtitle reveal">
            I craft beautiful, performant web applications using Laravel, Vue.js, and modern technologies that solve real-world problems.
        </p>
        <div class="hero-actions reveal">
            <a href="#projects" class="btn btn-primary">View My Work</a>
            <a href="#contact" class="btn btn-outline">Get In Touch</a>
        </div>
        <div class="hero-stats reveal">
            <div class="stat">
                <span class="stat-num">{{ $projects->count() }}+</span>
                <span class="stat-label">Projects</span>
            </div>
            <div class="stat-divider"></div>
            <div class="stat">
                <span class="stat-num">{{ $skills->flatten()->count() }}+</span>
                <span class="stat-label">Skills</span>
            </div>
            <div class="stat-divider"></div>
            <div class="stat">
                <span class="stat-num">3+</span>
                <span class="stat-label">Years Exp.</span>
            </div>
        </div>
    </div>
    <div class="hero-scroll">
        <a href="#about" class="scroll-indicator">
            <span>Scroll</span>
            <div class="scroll-arrow"></div>
        </a>
    </div>
</section>

{{-- ═══════════════ ABOUT ═══════════════ --}}
<section class="section" id="about">
    <div class="container">
        <div class="section-header reveal">
            <span class="section-tag">About Me</span>
            <h2 class="section-title">Passion meets <span class="gradient-text">expertise</span></h2>
        </div>
        <div class="about-grid">
            <div class="about-text reveal">
                <p class="about-lead">I'm a full-stack developer with a strong focus on building elegant, scalable web applications.</p>
                <p class="about-body">With a deep expertise in the Laravel ecosystem and modern frontend frameworks, I love transforming complex problems into simple, beautiful solutions. I care deeply about clean code, developer experience, and delivering real value.</p>
                <div class="about-tags">
                    <span class="tag">🏗️ Clean Architecture</span>
                    <span class="tag">⚡ Performance</span>
                    <span class="tag">🎨 UI/UX</span>
                    <span class="tag">🔐 Security</span>
                </div>
            </div>
            <div class="skills-panel reveal">
                @foreach($skills as $category => $categorySkills)
                <div class="skill-category">
                    <h4 class="skill-category-title">{{ $category }}</h4>
                    @foreach($categorySkills as $skill)
                    <div class="skill-item">
                        <div class="skill-header">
                            <span class="skill-name">{{ $skill->name }}</span>
                            <span class="skill-pct">{{ $skill->proficiency }}%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-fill" data-width="{{ $skill->proficiency }}"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════ PROJECTS ═══════════════ --}}
<section class="section section-dark" id="projects">
    <div class="container">
        <div class="section-header reveal">
            <span class="section-tag">Portfolio</span>
            <h2 class="section-title">Recent <span class="gradient-text">Projects</span></h2>
            <p class="section-subtitle">A selection of my favourite work</p>
        </div>

        {{-- Filters --}}
        @if($categories->count() > 1)
        <div class="filter-bar reveal">
            <button class="filter-btn active" data-filter="all">All</button>
            @foreach($categories as $cat)
            <button class="filter-btn" data-filter="{{ $cat }}">{{ $cat }}</button>
            @endforeach
        </div>
        @endif

        {{-- Projects Grid --}}
        <div class="projects-grid" id="projectsGrid">
            @forelse($projects as $project)
            <article class="project-card reveal" data-category="{{ $project->category }}">
                <div class="card-image">
                    @if($project->image)
                        <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" loading="lazy">
                    @else
                        <div class="card-placeholder">
                            <span class="placeholder-icon">🚀</span>
                        </div>
                    @endif
                    @if($project->featured)
                    <span class="card-badge">✨ Featured</span>
                    @endif
                    <span class="card-category">{{ $project->category }}</span>
                </div>
                <div class="card-body">
                    <h3 class="card-title">{{ $project->title }}</h3>
                    <p class="card-desc">{{ $project->description }}</p>
                    @if($project->technologies && count($project->technologies))
                    <div class="card-tech">
                        @foreach($project->technologies as $tech)
                        <span class="tech-tag">{{ $tech }}</span>
                        @endforeach
                    </div>
                    @endif
                    <div class="card-links">
                        @if($project->github_url)
                        <a href="{{ $project->github_url }}" target="_blank" rel="noopener" class="card-link card-link-github">
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
                            GitHub
                        </a>
                        @endif
                        @if($project->live_url)
                        <a href="{{ $project->live_url }}" target="_blank" rel="noopener" class="card-link card-link-live">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6M15 3h6v6M10 14L21 3"/></svg>
                            Live Demo
                        </a>
                        @endif
                    </div>
                </div>
            </article>
            @empty
            <div class="empty-projects">
                <p>No projects yet. <a href="{{ route('admin.login') }}">Add some from the admin panel →</a></p>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ═══════════════ CONTACT ═══════════════ --}}
<section class="section" id="contact">
    <div class="container">
        <div class="section-header reveal">
            <span class="section-tag">Contact</span>
            <h2 class="section-title">Let's <span class="gradient-text">work together</span></h2>
            <p class="section-subtitle">Have a project in mind? I'd love to hear about it.</p>
        </div>
        <div class="contact-grid">
            <div class="contact-info reveal">
                <div class="contact-card">
                    <span class="contact-icon">📧</span>
                    <div>
                        <h4>Email</h4>
                        <a href="mailto:jamestrinidad344@gmail.com">jamestrinidad344@gmail.com</a>
                    </div>
                </div>
                <div class="contact-card">
                    <span class="contact-icon">💼</span>
                    <div>
                        <h4>LinkedIn</h4>
                        <a href="#" target="_blank">linkedin.com/in/james</a>
                    </div>
                </div>
                <div class="contact-card">
                    <span class="contact-icon">🐙</span>
                    <div>
                        <h4>GitHub</h4>
                        <a href="#" target="_blank">github.com/jamesneedcode</a>
                    </div>
                </div>
            </div>
            <form class="contact-form reveal" id="contactForm">
                @csrf
                <div class="form-group">
                    <label for="contact_name">Your Name</label>
                    <input type="text" id="contact_name" name="name" placeholder="John Doe" required>
                </div>
                <div class="form-group">
                    <label for="contact_email">Email Address</label>
                    <input type="email" id="contact_email" name="email" placeholder="john@example.com" required>
                </div>
                <div class="form-group">
                    <label for="contact_message">Message</label>
                    <textarea id="contact_message" name="message" rows="5" placeholder="Tell me about your project..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-full" id="submitContactBtn">Send Message 🚀</button>
            </form>
        </div>
    </div>
</section>

{{-- ═══════════════ FOOTER ═══════════════ --}}
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <p class="footer-brand">James<span class="logo-dot">.</span></p>
            <p class="footer-copy">© {{ date('Y') }} James. Built with Laravel & ❤️</p>
            <div class="footer-links">
                <a href="{{ route('admin.login') }}">Admin</a>
            </div>
        </div>
    </div>
</footer>

@endsection
