#! /bin/bash
if [[ $# -gt 0 ]]; then
    case "$1" in
        -h|--help)
            echo "___________________________________________"
            echo "*******************************************"
            echo "-r ou --run Executa ambiente de Dev"
            echo "-s ou --stop Força stop dos containers"
            echo "-up Run Sem resetar imagens"
            echo "--start Roda imagens ja armazenadas"
            echo "___________________________________________"
            echo "*******************************************"
        ;;
        -up)
            docker-compose up
        ;;
        -r|--run)
            docker-compose down
            docker-compose up
        ;;
        --start)
            docker start gamestore_pgadmin_1 gamestore_postgres_1 gamestore_nginx_1 gamestore_php_1
        ;;
        -s|--stop)
            docker stop gamestore_pgadmin_1 gamestore_postgres_1 gamestore_nginx_1 gamestore_php_1
        ;;
    esac
    exit 0;
fi
