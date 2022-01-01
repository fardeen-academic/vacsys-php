#include <stdio.h>
#include <string.h>
#include <math.h>
#include <stdlib.h>

#define BLANK ' '
#define TAB '\t'
#define MAX 50

char prefix[MAX];
char stack[MAX][MAX];

void convert_Prefix_to_postfix()
{
    int i;
    char operand1[MAX], operand2[MAX];
    char symbol;
    char temp[2];
    char strin[MAX];
    for (i = strlen(prefix) - 1; i >= 0; i--)
    {
        symbol = prefix[i];
        temp[0] = symbol;
        temp[1] = '\0';

        if (!check_WhiteSpace(symbol))
        {
            switch (symbol)
            {
            case '+':
            case '-':
            case '*':
            case '/':
            case '%':
            case '^':
                strcpy(operand1, pop_Data());
                strcpy(operand2, pop_Data());
                strcpy(strin, operand1);
                strcat(strin, operand2);
                strcat(strin, temp);
                push_Data(strin);
                break;
            default:
                push_Data(temp);
            }
        }
    }
    printf("\nPostfix Expression :: ");
    puts(stack[0]);
}

void push_Data(char *str)
{
    if (top > MAX)
    {
        printf("\nStack overflow\n");
        exit(1);
    }
    else
    {
        top = top + 1;
        strcpy(stack[top], str);
    }
}

char *pop_Data()
{
    if (top == -1)
    {
        printf("\nStack underflow \n");
        exit(2);
    }
    else
        return (stack[top--]);
}
int is_Empty()
{
    if (top == -1)
        return 1;
    else
        return 0;
}
int check_WhiteSpace(char symbol)
{
    if (symbol == BLANK || symbol == TAB || symbol == '\0')
        return 1;
    else
        return 0;
}

int main()
{
    top = -1;
    printf("Enter Prefix Expression : ");
    gets(prefix);
    convert_Prefix_to_postfix();
}
