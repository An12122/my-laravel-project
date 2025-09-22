pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/An12122/my-laravel-project.git'
            }
        }

        stage('Install Dependencies') {
            steps {
                bat 'composer install'
            }
        }

        stage('Run Tests') {
            steps {
                bat 'vendor\\bin\\phpunit'
            }
        }

        stage('Build/Deploy') {
            steps {
                echo '✅ Build/Deploy stage executed'
            }
        }
    }

    post {
        success {
            echo '✅ Build ناجح!'
        }
        failure {
            echo '❌ Build فشل!'
        }
    }
}
