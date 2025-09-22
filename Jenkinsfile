pipeline {
    agent any

    environment {
        // PATH to PHP إذا لازم، مثال:
        PATH = "${env.PATH};C:\\php"
    }

    stages {
        stage('Checkout') {
            steps {
                git url: 'https://github.com/An12122/my-laravel-project.git', branch: 'main'
            }
        }

        stage('Install Dependencies') {
            steps {
                bat 'composer install'
            }
        }

        stage('Database Migration') {
            steps {
                bat 'php artisan migrate --force'
            }
        }

        stage('Run Tests') {
            steps {
                bat 'php artisan test'
            }
        }

        stage('Build/Deploy') {
            steps {
                echo 'Build/Deploy steps go here'
                // هنا ممكن تضيف أي أوامر نشر أو نسخ الملفات للخادم
            }
        }
    }

    post {
        success {
            echo '✅ Build نجح!'
        }
        failure {
            echo '❌ Build فشل!'
        }
    }
}
