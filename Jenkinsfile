pipeline {
    agent any

    stages {
        stage('Build') {
            steps {
                echo 'Building..'
            }
        }
        stage('Test') {
            steps {
                echo 'Testing..'
            }
        }
        stage('Deploy') {
            steps {
                echo 'Deploying....'
            }
        }
        stage('realDeploy') {
            steps {
                echo 'realDeploying....'
                sshagent(credentials : ['8bc2cf17-308b-4992-bd53-bf8f43d0c3ad']) {
                    sh 'ssh -o StrictHostKeyChecking=no ubuntu@web-app-server uptime'
                    sh 'ssh -v ubuntu@web-app-server'
                    

            }
        }
    }
}