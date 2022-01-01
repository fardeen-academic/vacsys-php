#include <stdio.h>
#include <stdlib.h>
#include <limits.h>
struct stack
{
    int data;
    struct stack *next;
};
struct Queue
{
    int front, rear, size;
    unsigned capacity;
    int *array;
};
void initStack(struct stack **s) { *s = NULL; }
void main()
{
    Stack__Using__Recursion();
    Queue__Using__Recursion();
}
int isEmpty(struct stack *s)
{
    if (s == NULL)
        return 1;
    return 0;
}
void push(struct stack **s, int x)
{
    struct stack *p = (struct stack *)malloc(sizeof(*p));
    if (p == NULL)
    {
        fprintf(stderr, "Memory allocation failed.\n");
        return;
    }
    p->data = x;
    p->next = *s;
    *s = p;
}
int pop(struct stack **s)
{
    int x;
    struct stack *temp;
    x = (*s)->data;
    temp = *s;
    (*s) = (*s)->next;
    free(temp);
    return x;
}
int top(struct stack *s) { return (s->data); }
void sortedInsert(struct stack **s, int x)
{
    if (isEmpty(*s) || x > top(*s))
    {
        push(s, x);
        return;
    }
    int temp = pop(s);
    sortedInsert(s, x);
    push(s, temp);
}
void sortStack(struct stack **s)
{
    if (!isEmpty(*s))
    {
        int x = pop(s);
        sortStack(s);
        sortedInsert(s, x);
    }
}
void printStack(struct stack *s)
{
    while (s)
    {
        printf("%d ", s->data);
        s = s->next;
    }
    printf("\n");
}
int Stack__Using__Recursion()
{
    struct stack *top;
    initStack(&top);
    push(&top, 30);
    push(&top, -5);
    push(&top, 18);
    push(&top, 14);
    push(&top, -3);
    printf("Stack elements before sorting:\n");
    printStack(top);
    sortStack(&top);
    printf("\n\n");
    printf("Stack elements after sorting:\n");
    printStack(top);
    printf("\n\n\n");
    return 0;
}
struct Queue *createQueue(unsigned capacity)
{
    struct Queue *queue = (struct Queue *)malloc(sizeof(struct Queue));
    queue->capacity = capacity;
    queue->front = queue->size = 0;
    queue->rear = capacity - 1;
    queue->array = (int *)malloc(
        queue->capacity * sizeof(int));
    return queue;
}
int isFull(struct Queue *queue)
{
    return (queue->size == queue->capacity);
}
int isEmptyt(struct Queue *queue)
{
    return (queue->size == 0);
}
void enqueue(struct Queue *queue, int item)
{
    if (isFull(queue))
        return;
    queue->rear = (queue->rear + 1) % queue->capacity;
    queue->array[queue->rear] = item;
    queue->size = queue->size + 1;
    printf("%d ", item);
}
int dequeue(struct Queue *queue)
{
    if (isEmptyt(queue))
        return INT_MIN;
    int item = queue->array[queue->front];
    queue->front = (queue->front + 1) % queue->capacity;
    queue->size = queue->size - 1;
    return item;
}
void reverse(struct Queue *queue)
{
    int element;
    if (isEmptyt(queue))
    {
        return;
    }
    element = dequeue(queue);
    reverse(queue);
    enqueue(queue, element);
}
int Queue__Using__Recursion()
{
    struct Queue *queue = createQueue(1000);
    printf("Queue elements before reversing:\n");
    enqueue(queue, 5);
    enqueue(queue, 24);
    enqueue(queue, 9);
    enqueue(queue, 6);
    enqueue(queue, 8);
    enqueue(queue, 4);
    enqueue(queue, 1);
    enqueue(queue, 8);
    enqueue(queue, 3);
    enqueue(queue, 6);
    printf("\n\nQueue elements after reversing:\n");
    reverse(queue);
    return 0;
}