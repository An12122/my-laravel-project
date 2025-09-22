pipeline {
    agent any

    environment {
        COMPOSER_HOME = "${env.WORKSPACE}/composer"
        PATH = "C:\\xampp\\php;${env.PATH}" // PHP موجود بالمسار
    }

    options {
        buildDiscarder(logRotator(numToKeepStr: '10')) // يحفظ آخر 10 Builds
        disableConcurrentBuilds() // يمنع Build متوازي لنفس المشروع
    }

    stages {

        stage('Clean Workspace') {
            steps {
                echo '🧹 Cleaning workspace...'
                deleteDir()
            }
        }

        stage('Checkout') {
            steps {
                echo '🔄 Checkout code from GitHub...'
                git url: 'https://github.com/An12122/my-laravel-project.git', branch: 'main'
            }
        }

        stage('Install Dependencies') {
            steps {
                echo '📦 Installing Composer dependencies...'
                bat 'composer install --no-interaction --prefer-dist'
            }
        }

        stage('Clear Cache & Config') {
            steps {
                echo '🧹 Clearing Laravel cache & config...'
                bat 'php artisan config:clear'
                bat 'php artisan cache:clear'
                bat 'php artisan route:clear'
                bat 'php artisan view:clear'
            }
        }

        stage('Run Migrations') {
            steps {
                echo '🗄️ Running database migrations...'
                bat 'php artisan migrate --force'
            }
        }

        stage('Run Tests') {
            steps {
                echo '🧪 Running Laravel tests...'
                bat 'php artisan test'
            }
        }

        stage('Optimize') {
            steps {
                echo '⚡ Optimizing autoload & config...'
                bat 'composer dump-autoload -o'
                bat 'php artisan optimize'
                bat 'composer install --no-interaction --prefer-dist '
            }
        }

        stage('Build/Deploy') {
            steps {
                echo '🚀 Build/Deploy placeholder'
                // هنا تضيف أوامر النشر الفعلية
            }
        }
    }

    post {
        success {
            echo '✅ Build succeeded and ready!'
        }
        failure {
            echo '❌ Build failed!'
        }
        always {
            echo '📌 Pipeline finished'
        }
    }
}
