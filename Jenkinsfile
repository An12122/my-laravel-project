pipeline {
    agent any

    environment {
        COMPOSER_HOME = "${env.WORKSPACE}/composer"
    }

    options {
        // يحفظ 10 Builds الأخيرة فقط لتوفير المساحة
        buildDiscarder(logRotator(numToKeepStr: '10'))
        // يمنع Build متوازي لنفس المشروع
        disableConcurrentBuilds()
    }

    stages {

        stage('Clean Workspace') {
            steps {
                echo '🧹 Cleaning workspace...'
                deleteDir() // يمسح كل الملفات القديمة
            }
        }

        stage('Checkout') {
            steps {
                echo '🔄 Checking out code from GitHub...'
                git url: 'https://github.com/An12122/my-laravel-project.git', branch: 'main'
            }
        }

        stage('Install Dependencies') {
            steps {
                echo '📦 Installing PHP dependencies with Composer...'
                bat 'composer install --no-interaction --prefer-dist'
            }
        }

        stage('Run Tests') {
            steps {
                echo '🧪 Running Laravel tests...'
                bat 'php artisan test'
            }
        }

        stage('Build/Deploy') {
            steps {
                echo '🚀 Build/Deploy stage placeholder'
                // هنا تضيف أوامر البناء أو النشر الخاصة بك
            }
        }
    }

    post {
        success {
            echo '✅ Build succeeded!'
        }
        failure {
            echo '❌ Build failed!'
        }
        always {
            echo '📌 Pipeline finished'
        }
    }
}
